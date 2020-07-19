<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/19
 * Time: 19:41
 */

namespace App\Http\Services\Chat;

use App\Http\Handlers\ChatHandler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * チャット書き込み
 */
class ChatCreator
{
	/**
	 * @var ChatHandler
	 */
	private $chat_handler;



	/**
	 * @return ChatCreator
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
	 * @return Model|Builder
	 */
	public function execute(array $params)
	{
		$user_id = $params['user_id'];
		$user_name = $params['user_name'];
		$room_id = $params['room_id'];
		$message = $params['message'];
		$time_sent = $params['time_sent'];

		return $this->chat_handler->create($user_id, $user_name, $room_id, $message, $time_sent);
	}
}