<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFavoriteRadio extends Model
{
	protected $primaryKey = ['user_id', 'radio_id'];

	public $incrementing = false;
}
