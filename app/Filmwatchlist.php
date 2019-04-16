<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filmwatchlist extends Model
{
   
    /* protected $fillable = ['movie_id', 'title', 'poster_path']; */
    /* protected $fillable = ['movieinfo']; */
    protected $fillable = ['movie_id', 'watchlist_id'];
    protected $table = "film_watchlist";

    /* protected $casts = [
        'movie_info' => 'array'
    ]; */

    public function watchlist()
    {
        return $this->belongsTo('App\Watchlist');
    }

    public function film()
    {
        return $this->belongsToMany('App\Film');
    }
}
