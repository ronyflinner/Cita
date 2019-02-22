<?Php

function currentUser() {
	return auth()->user();
}

function exploid_blade($note, $condition = null) {
	$disponibilidad = explode('-', $note);
	if ($condition == 1) {
		return [$disponibilidad[0], $disponibilidad[1]];

	} else {
		return $disponibilidad[0];
	}

}

function verificarEstadoUsuario() {
	$cita = App\Model\Cita::where('paciente_id', Auth::user()->id)->where('status_asistio', 1)->get();

	if (count($cita) > 0) {

		if ($cita[0]->status_pago != 1 && $cita[0]->status_asistio == 1) {
			$cita_condition = " - Usted posee una cita en espera de pago.";
		} else {
			$cita_condition = " - Posee una Cita Activa.";
		}

	} else {
		$cita_condition = null;
	}
	return $cita_condition;

}
