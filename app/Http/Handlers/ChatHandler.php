<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/19
 * Time: 19:19
 */

namespace App\Http\Handlers;

use App\Chat;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

/**
 * Class ChatHandler
 *
 * @package App\Http\Handlers
 */
class ChatHandler
{
	/**
	 * @var Chat
	 */
	private $chat;



	/**
	 * ChatHandler constructor.
	 */
	public function __construct()
	{
		$this->chat = new Chat();
	}



	/**
	 * 作成
	 *
	 * @param int      $user_id   ユーザーID
	 * @param string   $user_name ユーザー名
	 * @param int      $room_id   ルームID
	 * @param string   $message   メッセージ
	 * @param DateTime $time_sent 送った時間
	 * @return Builder|Model
	 */
	public function create(int $user_id, string $user_name, int $room_id, string $message, DateTime $time_sent)
	{
		return $this->chat::query()
			->create([
				'user_id' => $user_id,
				'user_name' => $user_name,
				'room_id' => $room_id,
				'message' => $message,
				'time_sent' => $time_sent,
			]);
	}



	/**
	 * すべて取得
	 *
	 * @return Builder[]|Collection
	 */
	public function fetchAll()
	{
		return $this->chat::query()
			->get();
	}



	/**
	 * ルームの指定時間以降のチャットすべて取得
	 *
	 * @param int      $room_id ルームID
	 * @param DateTime $date_time
	 * @return Builder[]|Collection
	 */
	public function fetchAllByRoomIdAfterTime(int $room_id, DateTime $date_time)
	{
		return $this->chat::query()
			->where('room_id', $room_id)
			->where('time_sent', '>', $date_time)
			->get();
	}
}