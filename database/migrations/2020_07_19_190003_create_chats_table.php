<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chats', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('user_id')->comment('ユーザーID');
			$table->string('user_name')->comment('ユーザー名');
			$table->unsignedInteger('room_id')->comment('ルームID');
			$table->string('message')->comment('メッセージ');
			$table->dateTime('time_sent')->comment('送った時間');
			$table->timestamps();
			$table->index(['room_id', 'time_sent']);
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('chats');
	}
}
