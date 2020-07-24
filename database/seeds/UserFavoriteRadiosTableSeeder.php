<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserFavoriteRadiosTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$user_favorite_radios = [
			[
				'user_id' => 1,
				'radio_id' => 1,
			],
			[
				'user_id' => 1,
				'radio_id' => 2,
			],
			[
				'user_id' => 1,
				'radio_id' => 3,
			],
			[
				'user_id' => 2,
				'radio_id' => 1,
			],
		];

		$table = DB::table('user_favorite_radios');
		$table->delete();
		DB::statement("ALTER TABLE user_favorite_radios AUTO_INCREMENT = 1;");
		foreach ($user_favorite_radios as $user_favorite_radio) {
			$table->insert([
				'user_id' => $user_favorite_radio['user_id'],
				'radio_id' => $user_favorite_radio['radio_id'],
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]);
		}
	}
}
