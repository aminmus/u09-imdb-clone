<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    //

    /* protected $fillable = ['user_id, title']; */
    protected $fillable = ['movie_id', 'title', 'poster_path'];

    protected $table = "watchlist";

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
