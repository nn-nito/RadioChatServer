<?php

namespace App\Http\Controllers;

use App\Http\Services\IrregularRadio\IrregularRadioFetcher;
use App\Http\Services\UserFavoriteRadio\UserFavoriteRadioCreator;
use App\Http\Services\UserFavoriteRadio\UserFavoriteRadioDeleter;
use App\Http\Services\UserFavoriteRadio\UserFavoriteRadioFetcher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * お気に入りのラジオやり取り
 */
class UserFavoriteRadioController extends Controller
{
	/**
	 * お気に入りのラジオ取得
	 *
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function userFavoriteRadios(Request $request): JsonResponse
	{
		$user_id = $request->get('user_id');
		$first_day_of_week = $request->get('first_day_of_week');
		$last_day_of_week = $request->get('last_day_of_week');

		// お気に入りのラジオ
		$responses['user_favorite_radios'] = UserFavoriteRadioFetcher::create()->fetchAllJoinedAndSortedRadioByUserId($user_id);
		// 今週放送するであろう不規則なラジオをすべて取得
		$responses['irregular_radios'] = IrregularRadioFetcher::create()->fetchAllIrregularRadioByRandStartTime($first_day_of_week, $last_day_of_week);

		return response()->json($responses);
	}



	/**
	 * お気に入り追加
	 *
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function create(Request $request): JsonResponse
	{
		$user_id = $request->post('user_id');
		$radio_id = $request->post('radio_id');

		$response = UserFavoriteRadioCreator::create()->insert($user_id, $radio_id);

		return response()->json($response);
	}



	/**
	 * お気に入り削除
	 *
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function delete(Request $request): JsonResponse
	{
		$user_id = $request->post('user_id');
		$radio_id = $request->post('radio_id');

		$response = UserFavoriteRadioDeleter::create()->delete($user_id, $radio_id);

		return response()->json([$response]);
	}
}
