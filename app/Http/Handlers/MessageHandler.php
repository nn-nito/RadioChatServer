<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/08/01
 * Time: 0:13
 */

namespace App\Http\Handlers;

use App\Message;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MessageHandler
 *
 * @package App\Http\Handlers
 */
class MessageHandler
{
	/**
	 * @var Message
	 */
	private $message;



	/**
	 * MessageHandler constructor.
	 */
	public function __construct()
	{
		$this->message = new Message();
	}



	/**
	 * 指定したキーのメッセージを取得
	 *
	 * @param string $key
	 * @return Builder|Model|object|null
	 */
	public function fetchMessageByKey(string $key)
	{
		return $this->message::query()
			->where('key', $key)
			->first();
	}
}