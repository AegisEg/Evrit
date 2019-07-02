<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
  protected $guarded = [];
  public function comments()
  {
    return $this->hasMany('App\Model\ImageComment', 'img_id', 'id');
  }
  public function user()
  {
    return $this->belongsTo('App\User', 'user_id', 'id');
  }
  public function user_likes()
  {
    return $this->belongsToMany('App\User', 'user_to_like', 'image_id', 'user_id');
  }
}
