<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/03/22
 * Time: 10:46
 */

namespace App\Http\Handlers;

use App\PopularProgram;
use App\Program;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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



	/**
	 * リレーションを取得
	 *
	 * @return BelongsTo
	 */
	public function program()
	{
		return $this->popular_program->belongsTo(Program::class);
	}



	/**
	 * プログラム、出演者とJoinしすべて取得
	 *
	 * @return Builder[]|Collection
	 */
	public function fetchAllByProgramIdAndJoin()
	{
		return $this->popular_program::query()
			->select(['programs.*', 'performers.name AS performer_name'])
			->join('programs', 'popular_programs.program_id', '=', 'programs.id')
			->join('performers', 'performers.program_id', '=', 'popular_programs.program_id')
			->get();
	}
}