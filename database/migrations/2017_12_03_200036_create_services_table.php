<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('services', function (Blueprint $table) {
			$table->increments('id');
			$table->string('slug')->unique()->index();
			$table->string('meta_title');
			$table->string('meta_desc', 160);
			$table->integer('photo_id');
			$table->string('title');
			$table->text('description');
			$table->string('location');
			$table->float('cost');
			$table->integer('status')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('services');
	}
}
