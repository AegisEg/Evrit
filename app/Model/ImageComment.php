<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\CarbonImmutable;
class ImageComment extends Model
{
  protected $table = "image_comments";
  protected $guarded = [];
  public function img()
  {
    return $this->belongsTo('App\Model\UserImage', 'img_id', 'id');
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
