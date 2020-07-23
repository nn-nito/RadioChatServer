<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/23
 * Time: 20:55
 */

namespace App\Http\Services\RadioStation;

use App\Http\Handlers\RadioStationHandler;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * ラジオ局取得
 */
class RadioStationFetcher
{
	/**
	 * @var RadioStationHandler
	 */
	private $radio_station_handler;



	/**
	 * デフォルト構成でインスタンス生成
	 *
	 * @return RadioStationFetcher
	 */
	public static function create(): RadioStationFetcher
	{
		return new self(new RadioStationHandler());
	}



	/**
	 * RadioStationFetcher constructor.
	 *
	 * @param RadioStationHandler $radio_station_handler
	 */
	public function __construct(RadioStationHandler $radio_station_handler)
	{
		$this->radio_station_handler = $radio_station_handler;
	}



	/**
	 * すべて取得
	 *
	 * @return Builder[]|Collection
	 */
	public function fetchAll()
	{
		return $this->radio_station_handler->fetchAll();
	}
}