<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadiosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('radios', function (Blueprint $table) {
			$table->id();
			$table->integer('same_id')->comment('同一のラジオを紐づける為のID');
			$table->string('title')->comment('タイトル');
			$table->string('title_kana')->comment('カナのタイトル');
			$table->string('body')->comment('簡単な説明');
			$table->integer('day_of_week')->comment('曜日 0~6 日からスタート');
			$table->string('performer')->comment('出演者');
			$table->integer('radio_station_id')->comment('ラジオ局ID');
			$table->time('on_air_start_time')->comment('放送開始時間');
			$table->time('on_air_end_time')->comment('放送終了時間');
			$table->boolean('is_main_air')->comment('本放送かどうか');
			$table->integer('display_order')->comment('表示順');
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
		Schema::dropIfExists('radios');
	}
}
