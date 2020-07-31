<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/08/01
 * Time: 0:22
 */

namespace App\Http\Handlers;

use App\AppVersion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AppVersionHandler
 *
 * @package App\Http\Handlers
 */
class AppVersionHandler
{
	/**
	 * @var AppVersion
	 */
	private $app_version;



	/**
	 * AppVersionHandler constructor.
	 */
	public function __construct()
	{
		$this->app_version = new AppVersion();
	}



	/**
	 * 指定した条件に紐づくアプリのバージョンを取得
	 *
	 * @param string $version
	 * @param int    $platform_id
	 * @return Builder|Model|object|null
	 */
	public function fetchAppByPrimaryKey(string $version, int $platform_id)
	{
		return $this->app_version::query()
			->where('version', $version)
			->where('platform_id', $platform_id)
			->first();
	}
}