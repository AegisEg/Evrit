<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    // public function user()
    // {
    //     
    // }

    public function user()
    {
        $this->hasMany('App\User','profession','id');
    }
}
