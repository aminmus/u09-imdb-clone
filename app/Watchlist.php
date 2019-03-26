<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
   
    /* protected $fillable = ['movie_id', 'title', 'poster_path']; */
    /* protected $fillable = ['name', 'user_id', 'film_id'];
 */
    protected $fillable = ['name'];
    protected $table = "watchlist";

    /* protected $casts = [
        'movie_info' => 'array'
    ]; */

    /* public function user()
    {
        return $this->belongsTo('App\User');
    } */

    public function films()
    {
        return $this->belongsToMany('App\Film', 'film_watchlist', 'film_id', 'watchlist_id');
    }
}
