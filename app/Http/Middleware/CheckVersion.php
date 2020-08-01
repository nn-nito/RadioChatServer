<?php

namespace App\Http\Middleware;

use App\Http\Handlers\AppVersionHandler;
use App\Http\Handlers\MessageHandler;
use Closure;
use Illuminate\Http\Request;

class CheckVersion
{
	/**
	 * Handle an incoming request.
	 *
	 * @param Request $request
	 * @param Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$version = $request->get('version');
		$platform_id = $request->get('platform_id');

		// アプリが最新かどうか
		// 引っ張ってこれたら最新
		$app_version = (new AppVersionHandler())->fetchLatestByPlatformId($platform_id);

		if (false === is_null($app_version) and $version !== $app_version->version) {
			// 最新ではないのでバージョン情報を返す
			return response()->json($app_version);
		}

		return $next($request);
	}
}
