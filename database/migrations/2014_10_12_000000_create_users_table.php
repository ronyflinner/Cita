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
			$table->string('name');
			$table->string('apellidoP');
			$table->string('apellidoM');
			$table->string('dni')->unique(); // D-XXXX , P-XXXX , E-xxxxx
			$table->string('numero')->unique();
			$table->string('email')->unique();
			$table->string('password');
			$table->string('slug')->unique();
			$table->integer('tipo');
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
