<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/03/22
 * Time: 10:46
 */

namespace App\Http\Handlers;

use App\PopularProgram;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class PopularProgramHandler
 *
 * @package App\Http\Handlers
 */
class PopularProgramHandler
{
	/**
	 * @var PopularProgram
	 */
	private $popular_program;



	/**
	 * PopularProgramHandler constructor.
	 */
	public function __construct()
	{
		$this->popular_program = new PopularProgram();
	}



	/**
	 * すべて取得
	 *
	 * @return Builder[]|Collection
	 */
	public function fetchAll()
	{
		return $this->popular_program::query()
			->get();
	}
}