<?php

namespace App\Http\Controllers;

use App\Http\Services\Radio\RadioFetcher;
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
		$title = $request->get('title', '');
		$responses = RadioFetcher::create()->searchAllRadioByTitle($title);

		return response()->json($responses);
	}
}
