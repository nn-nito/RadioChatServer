<?php

namespace App\Http\Controllers;

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

		$responses = UserFavoriteRadioFetcher::create()->fetchAllJoinedAndSortedRadioByUserId($user_id);

		return response()->json($responses);
	}
}
