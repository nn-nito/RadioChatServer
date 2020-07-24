<?php

namespace App\Http\Controllers;

use App\Http\Services\Radio\RadioFetcher;
use App\Http\Services\UserFavoriteRadio\UserFavoriteRadioFetcher;
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
		$user_id = $request->get('user_id');
		$day_of_week = $request->get('day_of_week');
		$current_time = $request->get('current_time');
		$time = (new DateTime($current_time))->format('H:i:s');

		$responses = [];
		// 現在放送中のラジオをすべて取得
		$responses['radios'] = RadioFetcher::create()->fetchAllNowOnAirByDayOfWeekAndCurrentTime($day_of_week, $time);
		// お気に入りに登録しているラジオすべて取得
		$responses['user_favorite_radios'] = UserFavoriteRadioFetcher::create()->fetchAllByUserId($user_id);

		return response()->json($responses);
	}
}
