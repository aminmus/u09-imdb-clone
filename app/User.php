<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // One User can write many Reviews
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    // One User can have many Watchlists
    public function watchlists()
    {
        return $this->hasMany('App\Watchlist');
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }
    
}
