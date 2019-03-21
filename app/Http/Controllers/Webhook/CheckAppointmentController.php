<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use App\Model\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Jenssegers\Date\Date;
use PDF;

class CheckAppointmentController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function handle(Request $request) {
		// Aqui ejecuta tu accion

		//  return view('reports.reciboPdf');
		$cita = Cita::where('slug', $request->slug)->get();
		//paciente_link
		//disponibilidad_link doctor_servicio_link

		//$documento = exploid_blade($cita[0]->paciente_link->dni, 1);

		if ($cita[0]->paciente_link->tipo_documento == 1) {
			$nombreDocumento = "DNI";
		} else if ($cita[0]->paciente_link->tipo_documento == 2) {
			$nombreDocumento = "Pasaporte";
		} else {
			$nombreDocumento = "Carnet Extranjería";
		}

		$pdf = PDF::loadView('reports.reciboPdf', ['cita' => $cita,
			'nombreDocumento' => $nombreDocumento,
			'numeroDocumento' => $cita[0]->paciente_link->dni]);

		$pdf->setPaper('a4', 'portrait')
			->setWarnings(false)
			->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'images' => true]);

		$date_structs = Date::now()->format('Ymdhis');
		$recibo = "Recibo" . $date_structs . $cita[0]->paciente_link->name . ".pdf";

		return $pdf->download($recibo);

		Log::info($request->all());
	}

}
