<?php

namespace App;

use App\Http\BaseModel;

class Chat extends BaseModel
{
	protected $cachePrefix = "chat";

	protected $cacheCooldownSeconds = 1800;

	protected $guarded = [];
}
