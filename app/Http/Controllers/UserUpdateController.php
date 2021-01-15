<?php

namespace App\Http\Controllers;

use App\Http\Services\User\UserUpdater;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * ユーザー更新
 */
class UserUpdateController extends Controller
{
	/**
	 * 更新
	 *
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function update(Request $request): JsonResponse
	{
		$user_id = $request->post('id');
		$name = $request->post('name');
		$authentication_code = $request->post('authentication_code');

		DB::beginTransaction();
		try {
			$response = UserUpdater::create()->updateName($user_id, $name ,$authentication_code);
			DB::commit();
		} catch (\Exception $exception) {
			DB::rollBack();
			throw new $exception;
		}

		return response()->json(['is_succeeded' => $response]);
	}
}
