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
    public static function IsChanelOpen($from_user, $to_user)
    {
        return Channel::whereHas('users', function ($query) use ($from_user) {
            $query->where('user_id', $from_user);
        })->whereHas('users', function ($query) use ($to_user) {
            $query->where('user_id', $to_user);
        })->first();
    }
}
