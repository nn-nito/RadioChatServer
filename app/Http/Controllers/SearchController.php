<?php

namespace App\Http\Controllers;

use App\Http\Services\Radio\RadioFetcher;
use App\Http\Services\UserFavoriteRadio\UserFavoriteRadioFetcher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * ラジオ検索
 */
class SearchController extends Controller
{
	/**
	 * ラジオを検索し取得
	 *
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function get(Request $request): JsonResponse
	{
		$user_id = $request->get('user_id');
		$title = $request->get('title');
		$title = $title ?? '';

		$responses = [];
		// 検索結果のラジオすべて取得
		$responses['radios'] = RadioFetcher::create()->searchAllRadioByTitle($title);
		// お気に入りに登録しているラジオすべて取得
		$responses['user_favorite_radios'] = UserFavoriteRadioFetcher::create()->fetchAllByUserId($user_id);

		return response()->json($responses);
	}
}
