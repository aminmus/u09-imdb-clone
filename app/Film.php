<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
   
    protected $fillable = ['movie_id', 'title', 'poster_path'];
    /* protected $fillable = ['movieinfo']; */

    protected $table = "film";

    /* protected $casts = [
        'movie_info' => 'array'
    ]; */

    public function watchlist() 
    {
        return $this->belongsToMany('App\Watchlist', 'film_watchlist', 'film_id', 'watchlist_id');
    }
}
