<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/27
 * Time: 15:18
 */

namespace App\Http\Handlers;

use App\IrregularRadio;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class IrregularRadioHandler
 *
 * @package App\Http\Handlers
 */
class IrregularRadioHandler
{
	/**
	 * @var IrregularRadio
	 */
	private $irregular_radio;



	/**
	 * IrregularRadioHandler constructor.
	 */
	public function __construct()
	{
		$this->irregular_radio = new IrregularRadio();
	}



	/**
	 * 曜日と現在時刻で放送中の不規則なラジオをすべて取得
	 *
	 * @param int    $day_of_week  曜日 0(日)~6(土)
	 * @param string $current_time 現在時刻 例)2020-10-07 00:00:00
	 * @return Builder[]|Collection
	 */
	public function fetchAllIrregularRadioByDayOfWeekAndCurrentTime(int $day_of_week, string $current_time)
	{
		return $this->irregular_radio::query()
			->where('day_of_week', $day_of_week)
			->where('on_air_start_time', '<=', $current_time)
			->where('on_air_end_time', '>=', $current_time)
			->get();
	}



	/**
	 * 開始時刻が指定した時刻の範囲内の不規則なラジオをすべて取得
	 *
	 * @param string $start_time 開始時刻 例)2020-10-07 00:00:00
	 * @param string $end_time   終了時刻 例)2020-10-08 00:00:00
	 * @return Builder[]|Collection
	 */
	public function fetchAllIrregularRadioByRandStartTime(string $start_time, string $end_time)
	{
		return $this->irregular_radio::query()
			->where('on_air_start_time', '>=', $start_time)
			->where('on_air_start_time', '<=', $end_time)
			->get();
	}
}