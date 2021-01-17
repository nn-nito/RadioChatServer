<?php
/**
 * Created by PhpStorm.
 * User: nn
 * Date: 2021/01/17
 * Time: 13:50
 */

namespace App;

/**
 * Class NGWord
 *
 * @package App
 */
class NGWord
{
	// NGワード
	public static $ng_words = [
		'えろ',
		'エロ',
		'ふぇら',
		'フェラ',
		'ばか',
		'しね',
		'死ね',
		'殺す',
		'ころす',
	];

	// NGワードを含んでいるがOKなワード
	public static $ok_words = [
		'イエロー',
		'フェラーリ',
		'だしね',
	];



	/**
	 * NGワードチェック
	 *
	 * @param string $word 検証したい文字列
	 * @return bool true:成功 false:失敗
	 */
	public static function check(string $word): bool
	{
		// 禁止ワードチェックフラグを0にセット
		$ng_flag = 0;

		// 一旦$word_tempへ
		$word_temp = $word;

		// 文字列を一旦小文字にする
		$word_temp = mb_strtolower($word_temp, 'utf-8');

		// 文字列内の半角カナ、濁点付きの文字、全角英数字、全角スペースを変換
		$word_temp = mb_convert_kana($word_temp, 'asVK', 'utf-8');

		// 空白スペースや、。を一旦削除
		$word_temp = preg_replace('/\s|、|。/', '', $word_temp);

		// 禁止キーワードを包括してしまう許可キーワードを一旦 * に変換
		foreach (self::$ok_words as $ok_words_val) {
			if (false !== mb_strpos($word_temp, $ok_words_val)) {
				$word_temp = str_replace($ok_words_val, '*', $word_temp);
			}
		}

		// 禁止ワードチェック
		foreach (self::$ng_words as $ng_words_val) {
			if (false !== mb_strpos($word_temp, $ng_words_val)) {
				// 禁止ワードが見つかった！
				$ng_flag = 1; // フラグに1を入れる
				break; // 処理の停止
			}
		}

		if ($ng_flag == 1) {
			// NGワードがあった
			return false;
		}
		
		return true;
	}
}