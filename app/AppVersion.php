<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppVersion extends Model
{
	protected $primaryKey = ['version', 'platform_id'];

	public $incrementing = false;

	protected $guarded = [];
}
