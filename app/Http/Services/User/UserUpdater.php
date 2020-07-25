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
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * ユーザー更新
 */
class UserUpdater
{
	/**
	 * @var UserHandler
	 */
	private $user_handler;



	/**
	 * デフォルト構成でインスタンス生成
	 *
	 * @return UserUpdater
	 */
	public static function create(): UserUpdater
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
	 * 更新
	 *
	 * @param int    $user_id ユーザーID
	 * @param string $name ユーザー名
	 * @param string $authentication_code 認証コード
	 * @return bool
	 */
	public function updateName(int $user_id, string $name, string $authentication_code): bool
	{
		return $this->user_handler->updateName($user_id, $name, $authentication_code);
	}
}
