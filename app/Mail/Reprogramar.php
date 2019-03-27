<?php

namespace App\Mail;

use App\Http\Controllers\traitsGeneral\principal;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reprogramar extends Mailable {
	use principal;
	use Queueable, SerializesModels;
	public $subject = 'Reprogramación de cita';
	public $valueMensaje;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($valueMensaje) {
		$this->valueMensaje = $valueMensaje;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		$valores = $this->valueMensaje;

		$fecha = $valores[0]->disponibilidad_link->fecha_link->f_fecha;
		$hora2 = explode(' - ', $valores[0]->disponibilidad_link->hora_link->r_hora);
		$hora = $hora2[0];
		$lugar = $valores[0]->disponibilidad_link->lugar_link->nombre . ", " . $valores[0]->disponibilidad_link->lugar_link->direccion;
		$ho = explode(' ', $hora);
		$ampm = $this->conversionAmPM($ho[0]);
		return $this->view('mensajes.reprogramar', ['codigo' => $valores[0]->referenceCode, 'fecha' => $fecha, 'hora' => $ho[0], 'lugar' => $lugar, 'slug' => $valores[0]->slug, 'ampm' => $ampm]);
	}
}
