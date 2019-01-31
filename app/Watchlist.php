<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    // One Watchlist belongs to one User
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
