<?php

namespace App\Http\Controllers;

use App\Http\Services\User\UserCreator;
use DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * ユーザー登録
 */
class UserSignUpController extends Controller
{
	/**
	 * 登録
	 *
	 * @param Request $request
	 * @return JsonResponse
	 * @throws \Exception
	 */
	public function signUp(Request $request): JsonResponse
	{
		$registered_time = $request->post('registered_time');

		$registered_time = new DateTime($registered_time);

		DB::beginTransaction();
		try {
			// ユーザー登録
			$response = UserCreator::create()->insert($registered_time);
			DB::commit();
		} catch (\Exception $exception) {
			DB::rollBack();
			throw new $exception;
		}

		return response()->json($response);
	}
}
