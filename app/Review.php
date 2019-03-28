<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
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
