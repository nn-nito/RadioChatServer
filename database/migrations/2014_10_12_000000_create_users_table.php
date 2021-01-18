<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('name')->comment('ユーザー名');
			$table->dateTime('registered_time')->comment('登録した日時');
			$table->string('user_code')->comment('ユーザーコード');
			$table->string('authentication_code')->comment('認証コード');
			$table->integer('ban_count')->default(0)->comment('バン忠告回数');
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
		Schema::dropIfExists('users');
	}
}
