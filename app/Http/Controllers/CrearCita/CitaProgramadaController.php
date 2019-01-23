<?php

namespace App\Http\Controllers\CrearCita;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traitsGeneral\principal;
use App\Model\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;
use PDF;

class CitaProgramadaController extends Controller {
	use principal;
	private $btnView;
	private $btnPdf;
	private $btnBaged;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		//$reniecDni = new DNI('');
		//return $reniecDni->get('76188250', true);
		return view('cita.citaprogramada');
	}

	public function getCitaProgramadaTable(request $request) {

		if ($request->ajax()) {
			$cita = Cita::where('paciente_id', Auth::id())->get();
			$r = 0;
			return Datatables($cita)
				->addColumn('n', function ($val) use (&$r) {
					return ++$r;
				})
				->addColumn('fecha', function ($val) {
					return $val->disponibilidad_link->fecha_link->f_fecha;
				})
				->addColumn('hora', function ($val) {
					return $val->disponibilidad_link->hora_link->r_hora;
				})
				->addColumn('lugar', function ($val) {
					return $val->disponibilidad_link->lugar_link->nombre;

				})
				->addColumn('status', function ($val) {

					switch ($val->status_asistio) {
					case 1:
						$buttonBaged = "<h5><span class='badge badge-secondary'>En proceso</span></h5>";
						break;
					case 2:
						$buttonBaged = "<h5><span class='badge badge-secondary'>Asistió</span></h5>";
						break;
					case 3:
						$buttonBaged = "<h5><span class='badge badge-secondary'>Reprogramado</span></h5>";
						break;
					default:
						$buttonBaged = "<h5><span class='badge badge-secondary'>No asistió</span></h5>";
						break;
					}

					return $buttonBaged;
				})

				->addColumn('action', function ($val) {
					$path = url('admin/usuario/citaprogramada/showPdf/');
					if ($val->status_asistio != 3) {
						$this->btnView = "<a href='" . $path . "/" . $val->slug . "/1' data-id='" . $val->id . "' target='_blank' class='btn btn-info btnView'><i class='fa fa-eye' aria-hidden='true' ></i></a>";

						$this->btnPdf = "<a href='" . $path . "/" . $val->slug . "/0' download data-id='" . $val->id . "' class='btn btn-danger btnPdf'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a>";

					} else {
						$this->btnView = "";

						$this->btnPdf = "";
					}

					return $this->btnView . $this->btnPdf;
				})
				->rawColumns(['status', 'action'])

				->make(true);
		}

	}

	public function showpdf(request $request, $slug, $condition = null) {

		//	return view('reports.reciboPdf');
		$cita = Cita::where('slug', $slug)->get();

		$pdf = PDF::loadView('reports.reciboPdf', compact('cita'));
		$pdf->setPaper('a4', 'portrait')
			->setWarnings(false)
			->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
		//$pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

		$date_structs = Date::now()->format('Ymdhis');
		$recibo = "Recibo" . $date_structs . $cita[0]->paciente_link->name;
		if ($condition == 1) {

			return $pdf->stream($recibo);
		} else {
			return $pdf->download($recibo);
		}

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
