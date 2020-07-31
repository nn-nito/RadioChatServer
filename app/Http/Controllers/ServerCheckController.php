<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServerCheckController extends Controller
{
	/**
	 * チェック
	 *
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function check(Request $request): JsonResponse
	{
		return response()->json(['is_succeeded' => true,]);
	}
}
