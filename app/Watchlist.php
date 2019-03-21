<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
<<<<<<< HEAD
    // One Watchlist belongs to one User
=======
    //

    /* protected $fillable = ['user_id, title']; */
    protected $fillable = ['imdbDB'];

    protected $table = "watchlist";

>>>>>>> test-branch-ruben
    public function user()
    {
        return $this->belongsTo('App\User');
    }
<<<<<<< HEAD

    // One Watchlist has many Films
    public function film()
    {
        return $this->hasMany('App\Film');
    }
=======
>>>>>>> test-branch-ruben
}
