<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/03/22
 * Time: 10:32
 */

namespace Tests\Feature;

use App\Http\Handlers\PopularProgramHandler;
use App\PopularProgram;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\CreatesApplication;
use Tests\TestCase;
use Throwable;

/**
 * Class HomeControllerTest
 *
 * @package Tests\Feature
 */
class HomeControllerTest extends TestCase
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
		$this->createApplication();
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
	public function index_人気番組を取得できなかった場合でもステータスコードが200であるべき()
	{
		$response = $this->get(route('home'));

		// ステータスコードが200であるか
		$response->assertOk();
		// Viewが意図するものであるか
		$response->assertViewIs('home');
	}



	/**
	 * @test
	 */
	public function index_人気番組をすべて取得できた場合ステータスコードが200であるべき()
	{
		factory(PopularProgram::class, 2)->create();

		$response = $this->get(route('home'));

		// ステータスコードが200であるか
		$response->assertOk();
		// Viewが意図するものであるか
		$response->assertViewIs('home');
		// Viewに渡すデータが正しいか
		$popular_programs = $this->popular_program_handler->fetchAll();
		$response->assertViewHas('popular_programs', $popular_programs);
	}
}