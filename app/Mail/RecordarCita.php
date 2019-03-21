<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecordarCita extends Mailable {
	use Queueable, SerializesModels;

	public $subject = 'Mensaje de Recordatorio';
	public $ronald;
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($ronald) {
		$this->ronald = $ronald;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		$valores = $this->ronald;

		$fecha = $valores->disponibilidad_link->fecha_link->f_fecha;
		$hora2 = explode('-', $valores->disponibilidad_link->hora_link->r_hora);
		$hora = $hora2[0];
		$lugar = $valores->disponibilidad_link->lugar_link->nombre . ", " . $valores->disponibilidad_link->lugar_link->direccion;

		return $this->view('mensajes.recordatorio', ['fecha' => $fecha, 'hora' => $hora, 'lugar' => $lugar, 'slug' => $valores->slug]);
	}
}
