<?php

namespace App\Http\Controllers\Liga;

use App\Http\Controllers\Controller;

class LccController extends Controller {
	public function vista_quienes() {
		return view('frontend.liga.nosotros.quienes');
	}
	public function vista_queHacemos() {
		return view('frontend.liga.nosotros.quehacemos');
	}
	public function vista_centroDetection() {
		return view('frontend.liga.nosotros.centrodeteccion');
	}
	public function vista_staff() {
		return view('frontend.liga.nosotros.staff');
	}
	public function vista_especialidades() {
		return view('frontend.liga.servicios.especialidades');
	}
	public function vista_servicio() {
		return view('frontend.liga.servicios.servicio');
	}

	/*Menu 2*/
	public function vista_formaDonacion() {
		return view('frontend.liga.colectaPublica.formaDonacion');
	}

	public function vista_campanaPublicitaria() {
		return view('frontend.liga.colectaPublica.campanaPublicitaria');
	}

	public function vista_resultadoColecta() {
		return view('frontend.liga.colectaPublica.resultadoColecta');
	}

	public function vista_benefactor() {
		return view('frontend.liga.aliado.aliado');
	}

	public function vista_marcas() {
		return view('frontend.liga.aliado.aliado');
	}

	public function vista_pancreas() {
		return view('frontend.liga.campana.pancreas');
	}

	public function vista_piel() {
		return view('frontend.liga.campana.piel');
	}

	public function vista_cuellouterino() {
		return view('frontend.liga.campana.cuellouterino');
	}

	public function vista_mama() {
		return view('frontend.liga.campana.mama');
	}

	public function vista_amomibolas() {
		return view('frontend.liga.campana.amomisbolas');
	}

	public function vista_vph() {
		return view('frontend.liga.campana.vph');
	}

	public function vista_diaContraElCancer() {
		return view('frontend.liga.campana.diamundial');
	}

}
