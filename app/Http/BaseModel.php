<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/25
 * Time: 15:02
 */

namespace App\Http;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
	use Cachable;
}