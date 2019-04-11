<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Review extends Model
{
    use Sortable;
    public $sortable = ['id', 'content', 'rating', 'created_at', 'updated_at', 'film_id', 'user_id'];

    protected $fillable = ['content', 'rating'];

    // One Review belongs to one Film (inverse relationship)
    public function film()
    {
        return $this->belongsTo('App\Film');
    }

    // One Review belongs to one User (inverse relationship)
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
