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
	 * 指定したルームで前に取得した日時から現在の指定時間の間のチャットすべて取得
	 *
	 * @param int           $user_id          ユーザーID
	 * @param int           $room_id          ルームID
	 * @param DateTime|null $before_time_sent 前に取得した投稿日時
	 * @param DateTime      $time_sent        投稿日時
	 * @return Builder[]|Collection
	 */
	public function fetchAllByRoomIdAfterTime(int $user_id, int $room_id, ?DateTime $before_time_sent, DateTime $time_sent)
	{
		if (is_null($before_time_sent))
		{
			// 前に取得した時間が空の場合は指定時間以降のデータ取得
			return $this->chat_handler->fetchAllByRoomIdAfterTime($room_id, $time_sent);
		}
		// 指定したルームで前に取得した日時から現在の指定時間の間のチャットすべて取得
		return $this->chat_handler->fetchAllByRoomIdBetween($user_id, $room_id, $before_time_sent, $time_sent);
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