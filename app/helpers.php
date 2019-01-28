<?Php

function currentUser() {
	return auth()->user();
}

function exploid_blade($note) {
	$disponibilidad = explode('-', $note);
	return $disponibilidad[0];
}