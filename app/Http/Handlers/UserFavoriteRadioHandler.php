<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/24
 * Time: 11:45
 */

namespace App\Http\Handlers;

use App\UserFavoriteRadio;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserFavoriteRadioHandler
 *
 * @package App\Http\Handlers
 */
class UserFavoriteRadioHandler
{
	/**
	 * @var UserFavoriteRadio
	 */
	private $user_favorite_radio;



	/**
	 * UserFavoriteRadioHandler constructor.
	 */
	public function __construct()
	{
		$this->user_favorite_radio = new UserFavoriteRadio();
	}



	/**
	 * ラジオと結合しユーザーIDに紐づき曜日で昇順にソートしたお気に入りのラジオをすべて取得
	 *
	 * @param int $user_id ユーザーID
	 * @return Builder[]|Collection
	 */
	public function fetchAllJoinedAndSortedRadioByUserId(int $user_id)
	{
		return $this->user_favorite_radio::query()
			->join('radios', 'radios.id', '=', 'user_favorite_radios.radio_id')
			->where('user_favorite_radios.user_id', $user_id)
			->orderBy('radios.day_of_week')
			->orderBy('on_air_start_time')
			->get();
	}



	/**
	 * 作成
	 *
	 * @param int $user_id
	 * @param int $radio_id
	 * @return Builder|Model
	 */
	public function create(int $user_id, int $radio_id)
	{
		return $this->user_favorite_radio::query()
			->create([
				'user_id' => $user_id,
				'radio_id' => $radio_id,
			]);
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
		return (bool)$this->user_favorite_radio::query()
			->where('user_id', $user_id)
			->where('radio_id', $radio_id)
			->delete();
	}



	/**
	 * ユーザーIDに紐づくお気に入りのラジオを取得
	 *
	 * @param int $user_id ユーザーID
	 * @return Builder[]|Collection
	 */
	public function fetchAllByUserId(int $user_id)
	{
		return $this->user_favorite_radio::query()
			->where('user_id', $user_id)
			->get();
	}
}