<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    // One Review belongs to one User
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
