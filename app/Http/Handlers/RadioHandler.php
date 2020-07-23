<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/23
 * Time: 0:05
 */

namespace App\Http\Handlers;

use App\Radio;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class RadioHandler
 *
 * @package App\Http\Handlers
 */
class RadioHandler
{
	/**
	 * @var Radio
	 */
	private $radio;



	/**
	 * RadioHandler constructor.
	 */
	public function __construct()
	{
		$this->radio = new Radio();
	}



	/**
	 * 曜日と現在時間で現在放送中のラジオをすべて取得
	 *
	 * @param int    $day_of_week  曜日 0(日)~6(土)
	 * @param string $current_time 現在時間 例)00:00:00
	 * @return Builder[]|Collection
	 */
	public function fetchAllNowOnAirByDayOfWeekAndCurrentTime(int $day_of_week, string $current_time)
	{
		return $this->radio::query()
			->where('day_of_week', $day_of_week)
			->where('on_air_start_time', '<=', $current_time)
			->where('on_air_end_time', '>=', $current_time)
			->orderBy('display_order', 'DESC')
			->get();
	}
}