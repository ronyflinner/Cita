<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('citas', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('paciente_id')->unsigned();
			$table->foreign('paciente_id')->references('id')->on('users')->onDelete('cascade');

			$table->integer('disponibilidad_id')->unsigned();
			$table->foreign('disponibilidad_id')->references('id')->on('disponibilidads')->onDelete('cascade');

			$table->integer('status_asistio');

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
		Schema::dropIfExists('citas');
	}
}
