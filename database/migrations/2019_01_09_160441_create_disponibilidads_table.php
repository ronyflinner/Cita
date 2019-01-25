<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponibilidadsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('disponibilidads', function (Blueprint $table) {
			$table->increments('id');

			$table->integer('status');
			$table->integer('lugar_id')->unsigned();
			$table->foreign('lugar_id')->references('id')->on('lugars')->onDelete('cascade');

			$table->integer('fecha_id')->unsigned();
			$table->foreign('fecha_id')->references('id')->on('fechas')->onDelete('cascade');

			$table->integer('doctor_id')->unsigned();
			$table->foreign('doctor_id')->references('id')->on('doctor__servicios')->onDelete('cascade');

			$table->integer('hora_id')->unsigned();
			$table->foreign('hora_id')->references('id')->on('horas')->onDelete('cascade');

			$table->integer('cantPaciente');

			$table->string('slug')->unique();
			$table->timestamps();
			// 0 : activo , 1 : inactivo
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('disponibilidads');
	}
}
