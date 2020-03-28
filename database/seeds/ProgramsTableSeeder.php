<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ProgramsTableSeeder
 */
class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$programs = [
			[
				'name' => '本渡上陸作戦',
				'url' => 'https://radio-recommend.s3-ap-northeast-1.amazonaws.com/hondo_jouriku.jpg',
				'filename' => 'hondo_jouriku.jpg',
				'info' => '文化放送『超！A&G＋』で毎週月曜 21:30~22:00に放送中',
				'account' => 'https://twitter.com/hjsakusen?lang=ja',
			],
			[
				'name' => '小原好美のココロおきなく',
				'url' => 'https://radio-recommend.s3-ap-northeast-1.amazonaws.com/kokorookinaku.jpg',
				'filename' => 'kokorookinaku.jpg',
				'info' => '文化放送「超!A&G＋」にて【毎週日曜20:00～20:30】に放送！',
				'account' => 'https://twitter.com/kokoradi_joqr',
			],
			[
				'name' => '田中美海のかもん！みなはうす♫',
				'url' => 'https://radio-recommend.s3-ap-northeast-1.amazonaws.com/minahausu.jpg',
				'filename' => 'minahausu.jpg',
				'info' => '文化放送超A&G +で毎週火曜25時30分から放送中の番組（はうす)',
				'account' => 'https://twitter.com/minahouse_joqr',
			],
			[
				'name' => '井口裕香のむ～～～ん',
				'url' => 'https://radio-recommend.s3-ap-northeast-1.amazonaws.com/igutiyuuka.jpg',
				'filename' => 'igutiyuuka.jpg',
				'info' => '文化放送 超！Ａ＆Ｇ＋で毎週月曜22:00～生放送でお届け',
				'account' => 'https://twitter.com/muuun_ag',
			],
		];

		$table = DB::table('programs');
		$table->delete();
		DB::statement("ALTER TABLE programs AUTO_INCREMENT = 1;");
		foreach ($programs as $program) {
			$table->insert([
				'name' => $program['name'],
				'url' => $program['url'],
				'filename' => $program['filename'],
				'info' => $program['info'],
				'account' => $program['account'],
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]);
		}
    }
}
