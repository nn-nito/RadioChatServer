<?php

namespace App\Http\Controllers;

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
	 */
    public function getAll(Request $request): JsonResponse
	{
		// day_of_week,current_time
	}
}
