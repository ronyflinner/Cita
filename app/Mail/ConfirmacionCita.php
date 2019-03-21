<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmacionCita extends Mailable {
	use Queueable, SerializesModels;
	public $subject = 'Mensaje de Confirmación';
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
		$hora2 = explode('-', $valores[0]->disponibilidad_link->hora_link->r_hora);
		$hora = $hora2[0];
		$lugar = $valores[0]->disponibilidad_link->lugar_link->nombre . ", " . $valores[0]->disponibilidad_link->lugar_link->direccion;

		return $this->view('mensajes.confirmacion', ['fecha' => $fecha, 'hora' => $hora, 'lugar' => $lugar, 'slug' => $valores[0]->slug]);
	}
}
