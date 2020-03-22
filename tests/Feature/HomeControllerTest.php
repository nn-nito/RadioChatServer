<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/03/22
 * Time: 10:32
 */

namespace Tests\Feature;

use App\Http\Handlers\ProgramHandler;
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
		DB::beginTransaction();

		$this->program_handler = new ProgramHandler();
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
	 * @testa
	 */
	public function index_人気番組をすべて取得できた場合ステータスコードが200であるべき()
	{
		$response = $this->get(route('home'));

		// ステータスコードが200であるか
		$response->assertOk();
		// Viewが意図するものであるか
		$response->assertViewIs('home');
	}
}