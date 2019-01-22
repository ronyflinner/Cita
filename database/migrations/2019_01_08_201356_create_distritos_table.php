<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistritosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('distritos', function (Blueprint $table) {
			$table->increments('id');
			$table->string('nombre');
			$table->integer('provincia_id')->unsigned();
			$table->foreign('provincia_id')->references('id')->on('provincias')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('distritos');
	}
}
