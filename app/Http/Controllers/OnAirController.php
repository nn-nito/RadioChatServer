<?php

namespace App\Http\Controllers;

use App\Http\Services\Radio\RadioFetcher;
use Carbon\Carbon;
use DateTime;
use Exception;
use Facade\FlareClient\Time\Time;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * 放送中ラジオやり取り
 */
class OnAirController extends Controller
{
	/**
	 * 放送中のラジオすべて取得
	 *
	 * @param Request $request
	 * @return JsonResponse
	 * @throws Exception
	 */
    public function getAll(Request $request): JsonResponse
	{
		$day_of_week = $request->get('day_of_week');
		$current_time = $request->get('current_time');
		$time = (new DateTime($current_time))->format('H:i:s');

		$radio_fetcher = RadioFetcher::create();
		// 現在放送中のラジオをすべて取得
		$responses = $radio_fetcher->fetchAllNowOnAirByDayOfWeekAndCurrentTime($day_of_week, $time);

		return response()->json($responses);
	}
}
