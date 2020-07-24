<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/24
 * Time: 11:57
 */

namespace App\Http\Services\UserFavoriteRadio;

use App\Http\Handlers\UserFavoriteRadioHandler;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * お気に入りのラジオ取得
 */
class UserFavoriteRadioDeleter
{
	/**
	 * @var UserFavoriteRadioHandler
	 */
	private $user_favorite_radio_handler;



	/**
	 * デフォルト構成でインスタンス生成
	 *
	 * @return UserFavoriteRadioDeleter
	 */
	public static function create(): UserFavoriteRadioDeleter
	{
		return new self(new UserFavoriteRadioHandler());
	}



	/**
	 * UserFavoriteRadioFetcher constructor.
	 *
	 * @param UserFavoriteRadioHandler $user_favorite_radio_handler
	 */
	public function __construct(UserFavoriteRadioHandler $user_favorite_radio_handler)
	{
		$this->user_favorite_radio_handler = $user_favorite_radio_handler;
	}



	/**
	 * 削除
	 *
	 * @param int $user_id  ユーザーID
	 * @param int $radio_id ラジオID
	 * @return bool
	 */
	public function delete(int $user_id, int $radio_id): bool
	{
		return $this->user_favorite_radio_handler->delete($user_id, $radio_id);
	}
}
