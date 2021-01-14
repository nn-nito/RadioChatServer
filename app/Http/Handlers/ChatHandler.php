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
				'time_sent' => $time_sent->format("Y-m-d H:i:s.v"),
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
	 * 指定したルームで前に取得した日時から現在の指定時間の間のチャットすべて取得
	 *
	 * @param int $user_id ユーザーID
	 * @param int      $room_id ルームID
	 * @param DateTime $before_date_time 前に取得した投稿日時
	 * @param DateTime $date_time
	 * @return Builder[]|Collection
	 */
	public function fetchAllByRoomIdAfterTime(int $user_id, int $room_id, DateTime $before_date_time, DateTime $date_time)
	{
		return $this->chat::query()
			->where('room_id', $room_id)
			->where('time_sent', '>', $before_date_time->format("Y-m-d H:i:s.v"))
			->where('time_sent', '<=', $date_time->format("Y-m-d H:i:s.v"))
			->where('user_id', '!=', $user_id)
			->get();
	}



	/**
	 * 指定したルームのチャットすべて取得
	 *
	 * @param int $room_id ルームID
	 * @return Builder[]|Collection
	 */
	public function fetchAllByRoomId(int $room_id)
	{
		return $this->chat::query()
			->where('room_id', $room_id)
			->get();
	}
}