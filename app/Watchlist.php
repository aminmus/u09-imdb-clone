<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    protected $fillable = ['movie_id', 'title', 'poster_path'];

    protected $table = "watchlists"; // Might be unnecessary

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // One Watchlist has many Films
    public function film()
    {
        return $this->hasMany('App\Film');
    }
}
