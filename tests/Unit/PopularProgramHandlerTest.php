<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/03/22
 * Time: 10:49
 */

namespace Tests\Unit;


use App\Http\Handlers\PopularProgramHandler;
use App\PopularProgram;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\CreatesApplication;
use Tests\TestCase;
use Throwable;

/**
 * Class PopularProgramHandlerTest
 *
 * @package Tests\Unit
 */
class PopularProgramHandlerTest extends TestCase
{
	use CreatesApplication;
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
		DB::rollBack();

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
}