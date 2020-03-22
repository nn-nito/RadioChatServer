<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/03/22
 * Time: 10:09
 */

namespace App\Http\Services;

use App\Http\Handlers\PopularProgramHandler;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * 人気の番組を取得
 */
class PopularProgramFetcher
{
	/**
	 * @var PopularProgramHandler
	 */
	private $popular_program_handler;



	/**
	 * @return PopularProgramFetcher
	 */
	public static function create(): self
	{
		return new self(
			new PopularProgramHandler()
		);
	}



	/**
	 * PopularProgramFetcher constructor.
	 *
	 * @param PopularProgramHandler $popular_program_handler
	 */
	public function __construct(
		PopularProgramHandler $popular_program_handler
	) {
		$this->popular_program_handler = $popular_program_handler;
	}



	/**
	 * すべてのデータ取得
	 *
	 * @return Builder[]|Collection
	 */
	public function fetchAll()
	{
		return $this->popular_program_handler->fetchAll();
	}
}