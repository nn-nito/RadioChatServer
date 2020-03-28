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



	/**
	 * プログラム、出演者のデータをすべて取得
	 *
	 * @return Builder[]|Collection
	 */
	public function fetchAllByProgramIdAndJoin()
	{
		// TODO:青島 クエリ一本にするためになんかごちゃごちゃやってしまった、、、（泣）まあ動くので良いということで

		$programs = $this->popular_program_handler->fetchAllByProgramIdAndJoin();
		$performers = [];
		foreach ($programs as $program) {
			$performers[$program->id][] = $program->performer_name;
		}

		$same_program_deletion_list = [];
		// ここで同じ番組を除外
		foreach ($programs as $key => $program) {
			foreach ($programs as $com_key => $com) {
				if ($com_key !== $key) {
					// 要素番号が異なる場合
					if ($com->id !== $program->id) {
						// program_idが異なる場合
						$same_program_deletion_list[$com->id] = $com;
					}
				}
			}
		}
		return [$same_program_deletion_list, $performers];
	}
}