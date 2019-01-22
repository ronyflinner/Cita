<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugarsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('lugars', function (Blueprint $table) {
			$table->increments('id');
			$table->string('nombre');
			$table->string('direccion');
			$table->integer('distrito_id')->unsigned();
			$table->foreign('distrito_id')->references('id')->on('distritos')->onDelete('cascade');
			$table->string('numero');
			$table->string('email');
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
		Schema::dropIfExists('lugars');
	}
}
