<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class PerformersTableSeeder
 */
class PerformersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$performers = [
			[
				'program_id' => 1,
				'name' => '本渡楓',
				'name_kana' => 'ほんどかえで',
			],
			[
				'program_id' => 1,
				'name' => '天津向',
				'name_kana' => 'てんしんむかい',
			],
			[
				'program_id' => 2,
				'name' => '小原好美',
				'name_kana' => 'こはらここみ',
			],
			[
				'program_id' => 3,
				'name' => '田中美海',
				'name_kana' => 'たなかみなみ',
			],
			[
				'program_id' => 4,
				'name' => '井口裕香',
				'name_kana' => 'いぐちゆうか',
			],
		];

		$table = DB::table('performers');
		$table->delete();
		DB::statement("ALTER TABLE performers AUTO_INCREMENT = 1;");
		foreach ($performers as $performer) {
			$table->insert([
				'program_id' => $performer['program_id'],
				'name' => $performer['name'],
				'name_kana' => $performer['name_kana'],
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]);
		}
	}
}
