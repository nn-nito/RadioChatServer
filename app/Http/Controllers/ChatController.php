<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Http\Handlers\UserHandler;
use App\Http\Services\Chat\ChatCreator;
use App\Http\Services\Chat\ChatFetcher;
use App\NGWord;
use DateTime;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;

/**
 * チャットをやり取りする
 */
class ChatController extends Controller
{
	private const BAN = 5;

	/**
	 * チャットを受け取りDBに格納
	 *
	 * @param Request $request
	 * @return JsonResponse
	 * @throws Exception
	 */
	public function write(Request $request): JsonResponse
	{
		$params = [];
		$params['user_id'] = $request->post('user_id');
		$params['user_name'] = $request->post('user_name');
		$params['room_id'] = $request->post('room_id');
		$params['message'] = $request->post('message');
		$params['time_sent'] = new DateTime($request->post('time_sent'));

		$is_validation_result = $this->validateChatMessage($params['message']);
		if (false === $is_validation_result) {
			return response()->json(['chat' => []]);
		}

		$user = (new UserHandler())->fetchById($params['user_id']);
		if (is_null($user)) {
			return response()->json(['chat' => []]);
		}
		if ($user->ban_count >= self::BAN) {
			// バン回数が閾値以上だった場合チャット書き込みができない
			return response()->json(['chat' => []]);
		}

		DB::beginTransaction();
		try {
			// チャット書き込み
			$response = ChatCreator::create()->execute($params);
			DB::commit();
		} catch (Exception $exception) {
			DB::rollBack();
			throw new $exception;
		}

		return response()->json([
			'chat' => $response,
		]);
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
		$user_id = $request->get('user_id');
		$room_id = $request->get('room_id');
		$time_sent = new DateTime($request->get('time_sent'));
		$before_time_sent = $request->get('before_time_sent');
		if (is_null($before_time_sent) or '' === $before_time_sent) {
			$before_time_sent = null;
		}
		if (false === is_null($before_time_sent)) {
			$before_time_sent = new DateTime($before_time_sent);
		}

		// 指定したルームで前に取得した日時から現在の指定時間の間のチャットすべて取得 自身(user)は除外
		$responses = ChatFetcher::create()->fetchAllByRoomIdAfterTime($user_id, $room_id, $before_time_sent, $time_sent);

		return response()->json([
			'chats' => $responses,
		]);
	}



	/**
	 * チャットをすべて取得
	 *
	 * @param Request $request
	 * @return JsonResponse
	 * @throws Exception
	 */
	public function getAll(Request $request): JsonResponse
	{
		$room_id = $request->get('room_id');

		// ルームの指定時間以降のチャットすべて取得
		$responses = ChatFetcher::create()->fetchAllByRoomId($room_id);

		return response()->json([
			'chats' => $responses,
		]);
	}



	/**
	 * チャットのメッセージの検証
	 *
	 * @param string|null $message
	 * @return bool true:成功 false:失敗
	 */
	private function validateChatMessage(?string $message): bool
	{
		if (is_null($message)) {
			return false;
		}

		if ('' === $message) {
			return false;
		}

		if (mb_strlen($message) > 50) {
			return false;
		}

		if (false === NGWord::check($message)) {
			return false;
		}

		return true;
	}
}
