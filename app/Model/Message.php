<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\CarbonImmutable;

class Message extends Model
{
    public function channel()
    {
        return $this->belongsTo('App\Model\Channel', 'parent_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function getCreatedAtAttribute($value)
    {
        return CarbonImmutable::parse($value)->calendar();
    }
}
