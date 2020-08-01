<?php

namespace App\Http\Middleware;

use App\Http\Handlers\MessageHandler;
use Closure;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;
use Illuminate\Http\Request;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        //
    ];



	/**
	 * Handle an incoming request.
	 *
	 * @param  Request  $request
	 * @param  Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->app->isDownForMaintenance()) {
			if ($this->inExceptArray($request)) {
				// 指定IPのユーザーはアクセスできる
				return $next($request);
			}

			// メンテメッセージを返す
			$message = (new MessageHandler())->fetchMessageByKey('SYSTEM.MAINTENANCE');

			return response()->json($message);
		}

		return $next($request);
	}
}
