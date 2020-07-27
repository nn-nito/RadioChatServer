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
				'room_id' => 1,
				'same_id' => 1,
				'title' => '小原好美のココロおきなく',
				'title_kana' => 'こはらこのみのこころおきなく',
				'body' => '文化放送「超!A&G＋」にて【毎週日曜20:00～20:30】に放送！',
				'day_of_week' => 0,
				'performer' => '小原好美',
				'radio_station_id' => 1,
				'on_air_start_time' => '20:00:00',
				'on_air_end_time' => '20:30:00',
				'is_main_air' => true,
				'display_order' => 2,
			],
			[
				'room_id' => 2,
				'same_id' => 2,
				'title' => '田中美海のかもん！みなはうす♫',
				'title_kana' => 'たなかみなみのかもん！みなはうす♫',
				'body' => '文化放送超A&G +で毎週火曜25時30分から放送中の番組（はうす)',
				'day_of_week' => 3,
				'performer' => '田中美海',
				'radio_station_id' => 1,
				'on_air_start_time' => '01:30:00',
				'on_air_end_time' => '02:00:00',
				'is_main_air' => true,
				'display_order' => 1,
			],
			[
				'room_id' => 3,
				'same_id' => 3,
				'title' => '本渡楓と天津向の 「本渡上陸作戦」',
				'title_kana' => 'ほんどかえでとてんしんむかいの 「ほんどじょうりくさくせん」',
				'body' => '文化放送『超！A&G＋』で毎週月曜 21:30~22:00に放送中の番組',
				'day_of_week' => 1,
				'performer' => '本渡楓・天津向',
				'radio_station_id' => 1,
				'on_air_start_time' => '21:30:00',
				'on_air_end_time' => '22:00:00',
				'is_main_air' => true,
				'display_order' => 4,
			],
			[
				'room_id' => 4,
				'same_id' => 4,
				'title' => 'ああああああああああ',
				'title_kana' => 'ああああああああああ',
				'body' => 'いいいいいいいいいいいいい',
				'day_of_week' => 1,
				'performer' => '田村ゆかり',
				'radio_station_id' => 1,
				'on_air_start_time' => '21:40:00',
				'on_air_end_time' => '22:00:00',
				'is_main_air' => true,
				'display_order' => 0,
			],
		];

		$table = DB::table('radios');
		$table->delete();
		DB::statement("ALTER TABLE radios AUTO_INCREMENT = 1;");
		foreach ($radios as $radio) {
			$table->insert([
				'room_id' => $radio['room_id'],
				'same_id' => $radio['same_id'],
				'title' => $radio['title'],
				'title_kana' => $radio['title_kana'],
				'body' => $radio['body'],
				'day_of_week' => $radio['day_of_week'],
				'performer' => $radio['performer'],
				'radio_station_id' => $radio['radio_station_id'],
				'on_air_start_time' => $radio['on_air_start_time'],
				'on_air_end_time' => $radio['on_air_end_time'],
				'is_main_air' => $radio['is_main_air'],
				'display_order' => $radio['display_order'],
				'is_irregular' => $radio['is_irregular'] ?? false,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]);
		}
    }
}
