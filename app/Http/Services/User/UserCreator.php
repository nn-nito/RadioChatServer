<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/24
 * Time: 11:57
 */

namespace App\Http\Services\User;

use App\Http\Handlers\UserFavoriteRadioHandler;
use App\Http\Handlers\UserHandler;
use App\Http\Services\Common\RandomCode;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * ユーザー作成
 */
class UserCreator
{
	/**
	 * @var string
	 */
	private const BASE_NAME = "ユーザ";

	/**
	 * @var UserHandler
	 */
	private $user_handler;



	/**
	 * デフォルト構成でインスタンス生成
	 *
	 * @return UserCreator
	 */
	public static function create(): UserCreator
	{
		return new self(new UserHandler());
	}



	/**
	 * UserCreator constructor.
	 *
	 * @param UserHandler $user_handler
	 */
	public function __construct(UserHandler $user_handler)
	{
		$this->user_handler = $user_handler;
	}



	/**
	 * 登録
	 *
	 * @param DateTime $registered_time 登録した日時
	 * @return Builder|Model
	 * @throws Exception
	 */
	public function insert(DateTime $registered_time)
	{
		// 名前生成
		$name = self::BASE_NAME . (string)RandomCode::generateIntCode(0, 9999999);
		// ユーザーコード生成
		$user_code = (string)Str::uuid();
		// 認証コード生成
		$authentication_code = (string)Str::uuid();

		return $this->user_handler->create($name, $registered_time, $user_code, $authentication_code);
	}
}
