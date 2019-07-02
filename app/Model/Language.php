<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
	public function user()
	{
		return $this->belongsToMany('App\User','language_user','language_id','user_id');
	}
}
