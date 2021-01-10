<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $primaryKey = 'key';

	public $incrementing = false;

	protected $guarded = [];
}
