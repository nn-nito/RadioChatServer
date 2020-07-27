<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIrregularRadiosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('irregular_radios', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('radio_id')->comment('ラジオID');
			$table->integer('day_of_week')->comment('曜日 0~6 日からスタート');
			$table->dateTime('on_air_start_time')->comment('放送開始時刻');
			$table->dateTime('on_air_end_time')->comment('放送終了時刻');
			$table->timestamps();
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('irregular_radios');
	}
}
