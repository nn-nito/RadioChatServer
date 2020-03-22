<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/03/22
 * Time: 10:09
 */

namespace App\Http\Services;

use App\Http\Handlers\ProgramHandler;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * 番組を取得
 */
class ProgramFetcher
{
	/**
	 * @var ProgramHandler
	 */
	private $program_handler;



	/**
	 * @return ProgramFetcher
	 */
	public static function create()
	{
		return new self(
			new ProgramHandler()
		);
	}



	/**
	 * ProgramFetcher constructor.
	 *
	 * @param ProgramHandler $program_handler
	 */
	public function __construct(
		ProgramHandler $program_handler
	) {
		$this->program_handler = $program_handler;
	}



	/**
	 * すべてのデータ取得
	 *
	 * @return Builder[]|Collection
	 */
	public function fetchAll()
	{
		return $this->program_handler->fetchAll();
	}
}