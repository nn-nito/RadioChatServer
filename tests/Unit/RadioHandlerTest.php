<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/23
 * Time: 11:01
 */

namespace Tests\Unit;

use App\Http\Handlers\RadioHandler;
use App\Radio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Throwable;

/**
 * Class RadioHandlerTest
 *
 * @package Tests\Unit
 */
class RadioHandlerTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @var RadioHandler
	 */
	private $radio_handler;



	/**
	 * setUp
	 */
	public function setUp(): void
	{
		parent::setUp();

		$this->radio_handler = new RadioHandler();
	}



	/**
	 * tearDown
	 *
	 * @throws Throwable
	 */
	public function tearDown(): void
	{
		$this->refreshDatabase();

		parent::tearDown();
	}



	/**
	 * 曜日と現在時間で現在放送中のラジオをすべて取得
	 *
	 * @test
	 */
	public function 現在時間が放送開始時間以降で放送終了時間以内の場合、現在放送中のラジオのみを取得できるべき()
	{
		// 事前準備
		$expected_list[] = factory(Radio::class, 1)->create([
			'day_of_week' => 0,
			'on_air_start_time' => '23:00:00',
			'on_air_end_time' => '23:30:00',
		])->toArray();
		$expected_list[] = factory(Radio::class, 1)->create([
			'day_of_week' => 0,
			'on_air_start_time' => '23:10:00',
			'on_air_end_time' => '23:40:00',
		])->toArray();

		// 実行
		$results = $this->radio_handler->fetchAllNowOnAirByDayOfWeekAndCurrentTime(0, '23:30:00');

		// 検証
		$this->assertCount(2, $results);
		foreach ($results as $key => $result) {
			$this->assertSame($expected_list[$key][0]['on_air_start_time'], $result->on_air_start_time);
			$this->assertSame($expected_list[$key][0]['on_air_end_time'], $result->on_air_end_time);
		}
	}
}