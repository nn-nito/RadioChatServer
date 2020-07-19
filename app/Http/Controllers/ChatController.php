<?php

namespace App\Http\Controllers;

use App\Http\Services\Chat\ChatCreator;
use App\Http\Services\Chat\ChatFetcher;
use DateTime;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * チャットをやり取りする
 */
class ChatController extends Controller
{
	/**
	 * チャットを受け取りDBに格納
	 *
	 * @param Request $request
	 * @return array
	 * @throws Exception
	 */
	public function write(Request $request): array
	{
		$params = [];
		$params['user_id'] = $request->post('user_id');
		$params['user_name'] = $request->post('user_name');
		$params['room_id'] = $request->post('room_id');
		$params['message'] = $request->post('message');
		$params['time_sent'] = new DateTime($request->post('time_sent'));

		DB::beginTransaction();
		try {
			// チャット書き込み
			ChatCreator::create()->execute($params);
			DB::commit();
		} catch (Exception $exception) {
			DB::rollBack();
			throw new $exception;
		}

		return [
			'is_success' => true,
		];
	}



	/**
	 * チャットを取得
	 *
	 * @param Request $request
	 * @return JsonResponse
	 * @throws Exception
	 */
	public function get(Request $request): JsonResponse
	{
		$params = [];
		$params['user_id'] = $request->get('user_id');
		$params['room_id'] = $request->get('room_id');
		$params['time_sent'] = new DateTime($request->get('time_sent'));

		// ルームの指定時間以降のチャットすべて取得
		$responses = ChatFetcher::create()->execute($params);

		return response()->json($responses);
	}
}
