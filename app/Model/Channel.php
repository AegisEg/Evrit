<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_to_channel', 'channel_id', 'user_id');
    }
    public function messages()
    {
        return $this->hasMany('App\Model\Message', 'parent_id', 'id');
    }
}
