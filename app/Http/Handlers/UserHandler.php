<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/25
 * Time: 10:38
 */

namespace App\Http\Handlers;

use App\User;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserHandler
 *
 * @package App\Http\Handlers
 */
class UserHandler
{
	/**
	 * @var User
	 */
	private $user;



	/**
	 * UserHandler constructor.
	 */
	public function __construct()
	{
		$this->user = new User();
	}



	/**
	 * 作成
	 *
	 * @param string   $name                ユーザー名
	 * @param DateTime $registered_time     登録した時刻
	 * @param string   $user_code           ユーザーコード
	 * @param string   $authentication_code 認証コード
	 * @return Builder|Model
	 */
	public function create(string $name, DateTime $registered_time, string $user_code, string $authentication_code)
	{
		return $this->user::query()
			->create([
				'name' => $name,
				'registered_time' => $registered_time,
				'user_code' => $user_code,
				'authentication_code' => $authentication_code,
			]);
	}



	/**
	 * 更新
	 *
	 * @param int    $user_id             ユーザーID
	 * @param string $name                ユーザー名
	 * @param string $authentication_code 認証コード
	 * @return bool
	 */
	public function updateName(int $user_id, string $name, string $authentication_code): bool
	{
		return (bool)$this->user::query()
			->where('id', $user_id)
			->where('authentication_code', $authentication_code)
			->update([
				'name' => $name,
			]);
	}



	/**
	 * ユーザーIDに紐づくユーザーを一件取得
	 *
	 * @param int $user_id ユーザーID
	 * @return Builder|Model|object|null
	 */
	public function fetchById(int $user_id)
	{
		return $this->user::query()
			->where('id', $user_id)
			->first();
	}
}