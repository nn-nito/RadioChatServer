<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/23
 * Time: 20:52
 */

namespace App\Http\Handlers;

use App\RadioStation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class RadioStationHandler
 *
 * @package App\Http\Handlers
 */
class RadioStationHandler
{
	/**
	 * @var RadioStation
	 */
	private $radio_station;



	/**
	 * RadioStationHandler constructor.
	 */
	public function __construct()
	{
		$this->radio_station = new RadioStation();
	}



	/**
	 * すべて取得
	 *
	 * @return Builder[]|Collection
	 */
	public function fetchAll()
	{
		return $this->radio_station::query()->get();
	}
}