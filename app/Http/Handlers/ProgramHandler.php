<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/03/21
 * Time: 23:23
 */

namespace App\Http\Handlers;

use App\Program;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ProgramHandler
 *
 * @package App\Http\Handlers
 */
class ProgramHandler
{
	/**
	 * @var Program
	 */
	private $program;



	/**
	 * ProgramHandler constructor.
	 */
	public function __construct()
	{
		$this->program = new Program();
	}



	/**
	 * 全て取得
	 *
	 * @return Builder[]|Collection
	 */
	public function fetchAll()
	{
		return $this->program::query()
			->get();
	}
}