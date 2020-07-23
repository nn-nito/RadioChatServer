<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// Webサイト
//		$this->call(ProgramsTableSeeder::class);
//		$this->call(PopularProgramsTableSeeder::class);
//		$this->call(PerformersTableSeeder::class);

		// リアルタイムチャット
		$this->call(ChatsTableSeeder::class);
		$this->call(RadiosTableSeeder::class);
	}
}
