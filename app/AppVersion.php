<?php

namespace App;

use App\Http\BaseModel;

class AppVersion extends BaseModel
{
	protected $primaryKey = ['version', 'platform_id'];

	public $incrementing = false;

	protected $guarded = [];
}
