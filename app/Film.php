<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    // One Film can have many Reviews
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
