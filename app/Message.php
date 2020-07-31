<?php

namespace App;

use App\Http\BaseModel;

class Message extends BaseModel
{
	protected $primaryKey = 'key';

	public $incrementing = false;

	protected $guarded = [];
}
