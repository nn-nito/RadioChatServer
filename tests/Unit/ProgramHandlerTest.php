<?php

namespace Tests\Unit;

use App\Http\Handlers\ProgramHandler;
use App\Program;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\TestCase;
use Tests\CreatesApplication;

/**
 * Class ProgramHandlerTest
 *
 * @package Tests\Unit
 */
class ProgramHandlerTest extends TestCase
{
	use CreatesApplication;
	use RefreshDatabase;

	/**
	 * @var ProgramHandler
	 */
	private $program_handler;



	/**
	 * setUp
	 */
	public function setUp(): void
	{
		parent::setUp();
		$this->createApplication();
		//		DB::statement("ALTER TABLE programs AUTO_INCREMENT = 0;");
		DB::beginTransaction();

		$this->program_handler = new ProgramHandler();
	}



	/**
	 * tearDown
	 */
	public function tearDown(): void
	{
		DB::rollBack();

		parent::tearDown();
	}



	/**
	 * @test
	 */
	public function すべて取得_すべてのデータを取得できるべき()
	{
		$programs = factory(Program::class, 2)->create();

		$results = $this->program_handler->fetchAll();

		//検証
		$this->assertCount(2, $results);
		$expects = $programs->toArray();
		/**
		 * @var int      $key
		 * @var  Program $result
		 */
		foreach ($results as $key => $result) {
			$this->assertSame($expects[$key]['name'], $result->name);
		}
	}



	/**
	 * @test
	 */
	public function すべて取得_紐づくデータが存在しない場合データを取得できないべき()
	{
		$results = $this->program_handler->fetchAll();

		// 検証
		$this->assertCount(0, $results);
	}
}
