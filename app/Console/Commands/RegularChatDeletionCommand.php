<?php

namespace App\Console\Commands;

use App\Http\Handlers\ChatHandler;
use App\Http\Handlers\RadioHandler;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegularChatDeletionCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'chat:regular-delete';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Delete chats regularly';



	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}



	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		// 0=日 1=月 2=火 3=水 4=木 5=金 6=土
		$day_of_week_list = [0 => 4, 1 => 5, 2 => 6, 3 => 0, 4 => 1, 5 => 2, 6 => 3];
		// 今日の曜日を取得
		$now_day_of_week = date('w');
		// 削除する曜日取得
		$deletion_day_of_week = $day_of_week_list[$now_day_of_week];
		// 削除する曜日に紐づくラジオのルームIDをラジオテーブルから引っ張ってくる
		DB::beginTransaction();
		try {
			$deletion_target_radios = (new RadioHandler())->fetchAllByDayOfWeek($deletion_day_of_week);
			$room_id_list = [];
			foreach ($deletion_target_radios as $deletion_target_radio) {
				$room_id_list[] = $deletion_target_radio->room_id;
			}

			$deletion_count = 0;
			if (0 < $room_id_list) {
				// そのルームIDにヒットするチャットを全削除
				$deletion_count = (new ChatHandler())->deleteByRoomId($room_id_list);
				DB::commit();
			}
		} catch (\Exception $exception) {
			DB::rollBack();
		}

		Log::info('バッチ実行 削除件数', ['count' => $deletion_count]);
		
		return 0;
	}
}
