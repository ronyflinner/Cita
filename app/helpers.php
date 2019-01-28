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
