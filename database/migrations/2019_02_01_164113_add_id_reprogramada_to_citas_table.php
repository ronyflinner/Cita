<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdReprogramadaToCitasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('citas', function (Blueprint $table) {
			$table->integer('idreprogramada')->after('status')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('citas', function (Blueprint $table) {
			$table->dropColumn('idreprogramadas');
		});
	}
}
