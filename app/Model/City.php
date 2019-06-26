<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table="cities";
    
    public function user()
    {
        $this->hasMany('App\User','city_id','id');
    }
}
