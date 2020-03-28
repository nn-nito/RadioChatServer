<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/03/22
 * Time: 10:49
 */

namespace Tests\Unit;


use App\Http\Handlers\PopularProgramHandler;
use App\Performer;
use App\PopularProgram;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Throwable;

/**
 * Class PopularProgramHandlerTest
 *
 * @package Tests\Unit
 */
class PopularProgramHandlerTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @var PopularProgramHandler
	 */
	private $popular_program_handler;



	/**
	 * setUp
	 */
	public function setUp(): void
	{
		parent::setUp();
		DB::beginTransaction();

		$this->popular_program_handler = new PopularProgramHandler();
	}



	/**
	 * tearDown
	 *
	 * @throws Throwable
	 */
	public function tearDown(): void
	{
		parent::tearDown();
	}



	/**
	 * @test
	 */
	public function すべて取得()
	{
		$expects = factory(PopularProgram::class, 2)->create()->toArray();

		$popular_programs = $this->popular_program_handler->fetchAll();
		// 検証
		$this->assertCount(2, $popular_programs);
		/**
		 * @var PopularProgram $popular_program
		 */
		foreach ($popular_programs as $key => $popular_program) {
			$this->assertSame($expects[$key]['program_id'], $popular_program->program_id);
		}
	}



	/**
	 * @test
	 */
	public function プログラム、出演者とJoinしすべて取得_Joinしたテーブルの情報が取得できてるべき()
	{
		// TODO:青島 テストがAUTOINCREMENTに依存してしまっている

		factory(PopularProgram::class, 2)->create()->toArray();

		$name_and_kana_list = [
			[
				'program_id' => 3,
				'name' => '本渡楓',
				'name_kana' => 'ほんどかえで',
			],
			[
				'program_id' => 3,
				'name' => '天津向',
				'name_kana' => 'てんしんむかい',
			],
			[
				'program_id' => 4,
				'name' => '小原好美',
				'name_kana' => 'こはらここみ',
			],
		] ;

		foreach ($name_and_kana_list as $name_and_kana) {
			factory(Performer::class)->create([
				'program_id' => $name_and_kana['program_id'],
				'name' => $name_and_kana['name'],
				'name_kana' => $name_and_kana['name_kana'],
			])->toArray();
		}

		$results = $this->popular_program_handler->fetchAllByProgramIdAndJoin();
//		dd($results->toArray());

		// 検証
		$this->assertCount(3, $results);
		foreach ($results as $key => $result) {
			$this->assertSame($name_and_kana_list[$key]['program_id'], $result->id);
			$this->assertSame($name_and_kana_list[$key]['name'], $result->performer_name);
		}
	}
}