<?php

namespace App\Http\Controllers\CrearCita;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traitsGeneral\principal;
use App\Model\Cita;
use App\Model\Disponibilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;
use PDF;

class CitaProgramadaController extends Controller {
	use principal;
	private $btnView;
	private $btnPdf;
	private $btnBaged;
	private $btnStatusPago;
	private $btnDel;
	private $btnPay;

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

					$disponibilidad = explode('-', $val->disponibilidad_link->hora_link->r_hora);
					return $disponibilidad[0];
					return $val->disponibilidad_link->hora_link->r_hora;
				})
				->addColumn('lugar', function ($val) {
					return $val->disponibilidad_link->lugar_link->nombre;

				})
				->addColumn('doctor', function ($val) {
					return $val->disponibilidad_link->doctor_servicio_link->usuario_link->name;

				})
				->addColumn('status', function ($val) {

					switch ($val->status_asistio) {
					case 1:
						$this->btnBaged = "<h5><span class='badge badge-secondary'>Programada</span></h5>";
						break;
					case 2:
						$this->btnBaged = "<h5><span class='badge badge-secondary'>Asistió</span></h5>";
						break;
					case 3:
						$this->btnBaged = "<h5><span class='badge badge-secondary'>Reprogramada</span></h5>";
						break;
					default:
						$this->btnBaged = "<h5><span class='badge badge-secondary'>No asistió</span></h5>";
						break;
					}

					return $this->btnBaged;
				})
				->addColumn('status_pago', function ($val) {

					//$btnStatusPago
					switch ($val->status_pago) {
					case 1:
						$this->btnStatusPago = "<h5><span class='badge badge-secondary'>Aprobado</span></h5>";
						break;
					case 2:
						$this->btnStatusPago = "<h5><span class='badge badge-secondary'>Rechazado</span></h5>";
						break;

					case 3:
						$this->btnStatusPago = "<h5><span class='badge badge-secondary'>Pendiente</span></h5>";
						break;
					}
					return $this->btnStatusPago;

				})

				->addColumn('action', function ($val) {
					$path = url('admin/usuario/citaprogramada/showPdf/');

					if ($val->status_pago == 1) {
						$this->btnView = "<a href='" . $path . "/" . $val->slug . "/1' data-id='" . $val->id . "' target='_blank' class='btn btn-info btnView' title='Descargar Recibo Cita N° " . $val->referenceCode . "' ><i class='fa fa-eye' aria-hidden='true' ></i></a>";

						$this->btnPdf = "<a href='" . $path . "/" . $val->slug . "/0' download data-id='" . $val->id . "' class='btn btn-danger btnPdf' title='Descargar Recibo Cita N° " . $val->referenceCode . "'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a>";

						$this->btnDel = "";
						$this->btnPay = "";
					} else {
						$this->btnView = "";

						$this->btnPdf = "";

						$this->btnDel = "<a href='' data-id='" . $val->id . "' class='btn btn-danger btnDel' title='Eliminar Cita N° " . $val->referenceCode . "' ><i class='fa fa-trash' aria-hidden='true'></i></a>";

						$this->btnPay = "<a href='' data-code='" . $val->referenceCode . "' data-id='" . $val->id . "' class='btn btn-success btnPay' data-toggle='modal' title='Pagar Cita N° " . $val->referenceCode . "' data-target='#pagarCitaModal'><i class='fa fa fa-credit-card' aria-hidden='true'></i></a>";
					}

					return $this->btnView . $this->btnPdf . $this->btnPay . $this->btnDel;
				})
				->rawColumns(['status', 'action', 'status_pago'])

				->make(true);
		}

	}

	public function showpdf(request $request, $slug, $condition = null) {

		//	return view('reports.reciboPdf');
		$cita = Cita::where('slug', $slug)->get();
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
		if ($condition == 1) {
			return $pdf->stream($recibo);
		} else {
			return $pdf->download($recibo);
		}

	}

	public function pagoCitaprogramada($id) {
		$cita = Cita::find($id);

		$template = "
		<div class='row'>
			<div class='col-md-6 text-center'>
				<div class='alert alert-info' role='alert'> Nombre del Servicio:<br> " . $cita->disponibilidad_link->doctor_servicio_link->servicio_link->nombre . "</div>
			</div>
			<div class='col-md-6 text-center'>
				<div class='alert alert-success' role='alert'>Precio del Servicio:<br> S/." . $cita->disponibilidad_link->doctor_servicio_link->servicio_link->costo . "</div>
			</div>
		  </div>

		 <small id='emailHelp' class='form-text text-muted'>Nota: Recuerde que deberar hacer clic en el boton regresar para retirar su recibo.</small>
		  </div>

		";

		$valores = self::credencialesPAyu($cita->disponibilidad_link->doctor_servicio_link->servicio_link->costo, $cita->referenceCode);

		$data = [
			'referenceCode' => $valores[0],
			'amount' => $valores[1],
			'signature' => $valores[2],
			'currency' => $valores[3],
			'description' => $valores[4],
			'accountId' => $valores[5],
			'merchantId' => $valores[6],
			'tax' => $valores[7],
			'buyeEmail' => Auth::user()->email,
		];

		return response()->json(['template' => $template, 'data' => $data]);

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
	public function destroy(Request $request, $id) {
		if ($request->ajax()) {
			$cita = Cita::find($id);

			if ($cita->status_pago != 1) {
				$disponibilidad = Disponibilidad::find($cita->disponibilidad_id);
				$disponibilidad->cantPaciente = $disponibilidad->cantPaciente + 1;
				$disponibilidad->save();
				$cita->delete();
				$mensaje = 1;

			} else {
				$mensaje = 2;
			}

			return response()->json(['data' => $mensaje]);

		}

	}
}
