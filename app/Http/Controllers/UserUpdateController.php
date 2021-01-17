<?php

namespace App\Http\Controllers;

use App\Http\Services\User\UserUpdater;
use App\NGWord;
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

		if (is_null($name) or '' === $name) {
			// 空だったらデフォへ
			$name = 'ユーザ9999';
		}

		if (mb_strlen($name) > 10) {
			// 文字数制限越えてたら最大文字数へ
			$name = mb_substr($name, 0, 10);
		}

		if (false === NGWord::check($name)) {
			// 含めないワードが入っていた
			return response()->json(['is_succeeded' => false]);
		}

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
