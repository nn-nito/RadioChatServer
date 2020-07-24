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

/**
 * お気に入りのラジオ取得
 */
class UserFavoriteRadioFetcher
{
	/**
	 * @var UserFavoriteRadioHandler
	 */
	private $user_favorite_radio_handler;



	/**
	 * デフォルト構成でインスタンス生成
	 *
	 * @return UserFavoriteRadioFetcher
	 */
	public static function create(): UserFavoriteRadioFetcher
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
	 * ラジオと結合しユーザーIDに紐づき曜日で昇順にソートしたお気に入りのラジオをすべて取得
	 *
	 * @param int $user_id ユーザーID
	 * @return Builder[]|Collection
	 */
	public function fetchAllJoinedAndSortedRadioByUserId(int $user_id)
	{
		return $this->user_favorite_radio_handler->fetchAllJoinedAndSortedRadioByUserId($user_id);
	}



	/**
	 * ユーザーIDに紐づくお気に入りのラジオを取得
	 *
	 * @param int $user_id ユーザーID
	 * @return Builder[]|Collection
	 */
	public function fetchAllByUserId(int $user_id)
	{
		return $this->user_favorite_radio_handler->fetchAllByUserId($user_id);
	}
}
