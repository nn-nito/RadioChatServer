<?php

namespace App\Http\Controllers;

use App\Http\Services\RadioStation\RadioStationFetcher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * ラジオ局やり取り
 */
class RadioStationController extends Controller
{
	/**
	 * すべて取得
	 *
	 * @return JsonResponse
	 */
	public function getAll()
	{
		$responses = RadioStationFetcher::create()->fetchAll();

		return response()->json($responses);
	}
}
