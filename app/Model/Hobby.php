<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
	public function user()
	{
		return $this->belongsToMany('App\User','hobby_user','hobby_id','user_id');
	}
}
