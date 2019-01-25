<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorServiciosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('doctor__servicios', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('servicio_id')->unsigned();
			$table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
			$table->integer('usuario_id')->unsigned();
			$table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('slug')->unique();
			$table->string('status');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('doctor__servicios');
	}
}
