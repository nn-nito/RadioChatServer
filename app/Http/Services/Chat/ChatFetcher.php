<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/19
 * Time: 20:07
 */

namespace App\Http\Services\Chat;

use App\Http\Handlers\ChatHandler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

/**
 * チャット取得
 */
class ChatFetcher
{
	/**
	 * @var ChatHandler
	 */
	private $chat_handler;



	/**
	 * @return ChatFetcher
	 */
	public static function create()
	{
		return new self(new ChatHandler());
	}



	/**
	 * ChatCreator constructor.
	 *
	 * @param ChatHandler $chat_handler
	 */
	public function __construct(ChatHandler $chat_handler)
	{
		$this->chat_handler = $chat_handler;
	}



	/**
	 * 実行
	 *
	 * @param array $params 入力値
	 * @return Builder[]|Collection
	 */
	public function execute(array $params)
	{
		$time_sent = $params['time_sent'];
		$room_id = $params['room_id'];

		// ルームの指定時間以降のチャットすべて取得
		return $this->chat_handler->fetchAllByRoomIdAfterTime($room_id, $time_sent);
	}
}