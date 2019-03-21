<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    //

    /* protected $fillable = ['user_id, title']; */
    protected $fillable = ['imdbDB'];

  

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
