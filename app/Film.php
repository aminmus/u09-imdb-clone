<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    // Set custom primary key and its options
    protected $primaryKey = 'movie_id';
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = ['movie_id', 'title', 'poster_path'];
    /* protected $fillable = ['movieinfo']; */

    protected $table = "film";

    /* protected $casts = [
        'movie_info' => 'array'
    ]; */

    public function watchlist()
    {
        return $this->belongsToMany('App\Watchlist', 'film_watchlist', 'movie_id', 'watchlist_id');
    }
    // One Film can have many Reviews
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    // One Film belongs to many Watchlists
    /* public function watchlists()
    {
        return $this->belongsToMany('App\Watchlist');
    } */
}
