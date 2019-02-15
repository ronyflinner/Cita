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
			$table->integer('status');
			$table->integer('status_asistio');
			$table->integer('status_pago');
			/*Codigo de Referencia*/
			$table->string('referenceCode')->nullable(true);
			$table->string('processingDate')->nullable(true);
			$table->string('buyerEmail')->nullable(true);
			$table->string('transactionId')->nullable(true);
			$table->string('reference_pol')->nullable(true);

			/*Tipo de pago*/
			$table->string('lapPaymentMethod')->nullable(true);
			$table->string('lapPaymentMethodTyp')->nullable(true);

			/*Estados de la transferecnia*/
			$table->string('message')->nullable(true);
			$table->string('transactionState')->nullable(true);
			$table->string('lapTransactionState')->nullable(true);

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
