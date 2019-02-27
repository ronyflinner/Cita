<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdprogramadaToCitasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('citas', function (Blueprint $table) {
			//
			$table->integer('idReprogramada')->after('status_pago')->default(1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('citas', function (Blueprint $table) {
			//
			$table->dropColumn('idReprogramada');
		});
	}
}
