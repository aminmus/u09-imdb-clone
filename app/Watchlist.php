<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    //

    /* protected $fillable = ['user_id, title']; */
    protected $fillable = ['imdbDB'];

    protected $table = "watchlists";

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
