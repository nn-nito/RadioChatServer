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
class UserFavoriteRadioCreator
{
	/**
	 * @var UserFavoriteRadioHandler
	 */
	private $user_favorite_radio_handler;



	/**
	 * デフォルト構成でインスタンス生成
	 *
	 * @return UserFavoriteRadioCreator
	 */
	public static function create(): UserFavoriteRadioCreator
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
	 * 作成
	 *
	 * @param int $user_id  ユーザーID
	 * @param int $radio_id ラジオID
	 * @return Builder|Model
	 */
	public function insert(int $user_id, int $radio_id)
	{
		return $this->user_favorite_radio_handler->create($user_id, $radio_id);
	}
}
