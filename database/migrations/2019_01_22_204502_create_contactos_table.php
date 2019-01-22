<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('contactos', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('paciente_id')->unsigned();
			$table->foreign('paciente_id')->references('id')->on('users')->onDelete('cascade');
			$table->text('mensaje');
			$table->integer('tipo');
			$table->integer('status')->default(0);
			$table->string('slug')->unique();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('contactos');
	}
}
