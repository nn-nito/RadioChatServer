<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFavoriteRadiosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_favorite_radios', function (Blueprint $table) {
			$table->bigInteger('user_id')->comment('ユーザーID');
			$table->bigInteger('radio_id')->comment('ラジオID');

			$table->primary(['user_id', 'radio_id']);
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
		Schema::dropIfExists('user_favorite_radios');
	}
}
