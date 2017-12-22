<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('role_id');
			$table->integer('photo_id')->nullable();
			$table->string('username');
			$table->integer('get_email')->default(1);
			$table->string('name');
			$table->text('about')->nullable();
			$table->text('website')->nullable();
			$table->text('facebook')->nullable();
			$table->text('twitter')->nullable();
			$table->string('email')->unique();
			$table->string('password');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
