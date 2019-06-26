<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    public function user()
    {
        $this->hasMany('App\User','religion','id');
    }
}
