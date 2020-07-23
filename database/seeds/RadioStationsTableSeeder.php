<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RadioStationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$radio_stations = [
			[
				'name' => '超！A＆G',
			],
			[
				'name' => '音泉',
			],
			[
				'name' => '響',
			],
			[
				'name' => '文化放送',
			],
			[
				'name' => 'ラジオ大阪OBC',
			],
		];

		$table = DB::table('radio_stations');
		$table->delete();
		DB::statement("ALTER TABLE radio_stations AUTO_INCREMENT = 1;");
		foreach ($radio_stations as $radio_station) {
			$table->insert([
				'name' => $radio_station['name'],
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]);
		}
    }
}
