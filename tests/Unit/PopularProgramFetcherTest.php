<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/03/22
 * Time: 10:12
 */

namespace Tests\Unit;

use App\Http\Handlers\PopularProgramHandler;
use App\Http\Services\PopularProgramFetcher;
use Mockery;
use Tests\TestCase;
use Throwable;

/**
 * Class PopularProgramFetcherTest
 *
 * @package Tests\Unit
 */
class PopularProgramFetcherTest extends TestCase
{
	/**
	 * @var PopularProgramFetcher
	 */
	private $popular_program_fetcher;

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

		$this->popular_program_handler = Mockery::mock(PopularProgramHandler::class);
		$this->popular_program_fetcher = new PopularProgramFetcher($this->popular_program_handler);
	}



	/**
	 * @throws Throwable
	 */
	public function tearDown(): void
	{
		parent::tearDown();
	}



	/**
	 * @test
	 */
	public function すべてのデータ取得()
	{
		// 関数チェック

		$this->popular_program_handler->expects()->fetchAll()->andReturn(Mockery::any());
		$this->popular_program_fetcher->fetchAll();
	}
}
