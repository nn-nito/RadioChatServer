<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2020/07/25
 * Time: 11:23
 */

namespace App\Http\Services\Common;

/**
 * ランダム
 */
class RandomCode
{
	/**
	 * ランダムな整数生成
	 *
	 * @param int $min
	 * @param int $max
	 * @return int
	 * @throws \Exception
	 */
	public static function generateIntCode(int $min, int $max): int
	{
		return random_int($min, $max);
	}
}