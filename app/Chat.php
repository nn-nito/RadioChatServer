<?php

namespace App;

use App\Http\BaseModel;

class Chat extends BaseModel
{
	protected $cachePrefix = "chat";

	protected $guarded = [];
}
