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
		$app_version = (new AppVersionHandler())->fetchAppByPrimaryKey($version, $platform_id);
		if (is_null($app_version)) {
			// 最新ではないのでメッセージを返す
			$message = (new MessageHandler())->fetchMessageByKey('SYSTEM.NOT_APP_LATEST');

			return ['message' => $message];
		}

		return $next($request);
	}
}
