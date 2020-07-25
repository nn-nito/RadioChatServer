<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/19
 * Time: 20:07
 */

namespace App\Http\Services\Chat;

use App\Http\Handlers\ChatHandler;
use DateTime;
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
	 * ルームの指定時間以降のチャットすべて取得
	 *
	 * @param int      $room_id   ルームID
	 * @param DateTime $time_sent 投稿日時
	 * @return Builder[]|Collection
	 */
	public function fetchAllByRoomIdAfterTime(int $room_id, DateTime $time_sent)
	{
		// ルームの指定時間以降のチャットすべて取得
		return $this->chat_handler->fetchAllByRoomIdAfterTime($room_id, $time_sent);
	}



	/**
	 * 指定したルームのチャットすべて取得
	 *
	 * @param int $room_id ルームID
	 * @return Builder[]|Collection
	 */
	public function fetchAllByRoomId(int $room_id)
	{
		return $this->chat_handler->fetchAllByRoomId($room_id);
	}
}