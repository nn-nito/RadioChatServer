<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RadiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$radios = [
			[
				'same_id' => 1,
				'title' => '小原好美のココロおきなく',
				'body' => '文化放送「超!A&G＋」にて【毎週日曜20:00～20:30】に放送！',
				'day_of_week' => 0,
				'on_air_start_time' => '20:00:00',
				'on_air_end_time' => '20:30:00',
				'is_main_air' => true,
				'display_order' => 2,
			],
			[
				'same_id' => 2,
				'title' => '田中美海のかもん！みなはうす♫',
				'body' => '文化放送超A&G +で毎週火曜25時30分から放送中の番組（はうす)',
				'day_of_week' => 3,
				'on_air_start_time' => '01:30:00',
				'on_air_end_time' => '02:00:00',
				'is_main_air' => true,
				'display_order' => 1,
			],
			[
				'same_id' => 3,
				'title' => '井口裕香のむ～～～ん',
				'body' => '文化放送 超！Ａ＆Ｇ＋で毎週月曜22:00～生放送でお届け',
				'day_of_week' => 1,
				'on_air_start_time' => '22:00:00',
				'on_air_end_time' => '23:00:00',
				'is_main_air' => true,
				'display_order' => 0,
			],
		];

		$table = DB::table('radios');
		$table->delete();
		DB::statement("ALTER TABLE radios AUTO_INCREMENT = 1;");
		foreach ($radios as $radio) {
			$table->insert([
				'same_id' => $radio['same_id'],
				'title' => $radio['title'],
				'body' => $radio['body'],
				'day_of_week' => $radio['day_of_week'],
				'on_air_start_time' => $radio['on_air_start_time'],
				'on_air_end_time' => $radio['on_air_end_time'],
				'is_main_air' => $radio['is_main_air'],
				'display_order' => $radio['display_order'],
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]);
		}
    }
}
