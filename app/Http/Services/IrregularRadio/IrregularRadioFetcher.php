<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/23
 * Time: 0:34
 */

namespace App\Http\Services\IrregularRadio;

use App\Http\Handlers\IrregularRadioHandler;
use App\Http\Handlers\RadioHandler;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * ラジオ取得
 */
class IrregularRadioFetcher
{
	/**
	 * @var IrregularRadioHandler
	 */
	private $irregular_radio_handler;



	/**
	 * デフォルト構成でインスタンス生成
	 *
	 * @return IrregularRadioFetcher
	 */
	public static function create(): IrregularRadioFetcher
	{
		return new self(new IrregularRadioHandler());
	}



	/**
	 * IrregularRadioFetcher constructor.
	 *
	 * @param IrregularRadioHandler $irregular_radio_handler
	 */
	public function __construct(IrregularRadioHandler $irregular_radio_handler)
	{
		$this->irregular_radio_handler = $irregular_radio_handler;
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
		return $this->irregular_radio_handler->fetchAllIrregularRadioByDayOfWeekAndCurrentTime($day_of_week, $current_time);
	}
}