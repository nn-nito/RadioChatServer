<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class PopularProgramsTableSeeder
 */
class PopularProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$popular_programs = [
			[
				'program_id' => 1,
			],
			[
				'program_id' => 2,
			],
			[
				'program_id' => 3,
			],
			[
				'program_id' => 4,
			],
		];

		$table = DB::table('popular_programs');
		$table->delete();
		DB::statement("ALTER TABLE popular_programs AUTO_INCREMENT = 1;");
		foreach ($popular_programs as $popular_program) {
			$table->insert([
				'program_id' => $popular_program['program_id'],
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]);
		}
    }
}
