<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGeneroPublicoToServicioTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('servicios', function (Blueprint $table) {
			$table->integer('publico_genero')->after('costo')->default(2);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('servicios', function (Blueprint $table) {
			$table->dropColumn('publico_genero');
		});
	}
}
