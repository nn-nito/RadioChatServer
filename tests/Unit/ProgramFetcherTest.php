<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/03/22
 * Time: 10:12
 */

namespace Tests\Unit;

use App\Http\Handlers\ProgramHandler;
use App\Http\Services\ProgramFetcher;
use Mockery;
use Tests\TestCase;
use Throwable;

/**
 * Class ProgramFetcherTest
 *
 * @package Tests\Unit
 */
class ProgramFetcherTest extends TestCase
{
	/**
	 * @var ProgramFetcher
	 */
	private $program_fetcher;

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

		$this->program_handler = Mockery::mock(ProgramHandler::class);
		$this->program_fetcher = new ProgramFetcher($this->program_handler);
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

		$this->program_handler->expects()->fetchAll()->andReturn(Mockery::any());
		$this->program_fetcher->fetchAll();
	}
}
