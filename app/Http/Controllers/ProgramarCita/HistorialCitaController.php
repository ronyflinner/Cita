<?php

namespace App\Http\Controllers\ProgramarCita;

use App\Http\Controllers\Controller;
use App\Mail\Reprogramar;
use App\Model\Cita;
use App\Model\Disponibilidad;
use App\Model\Fecha;
use App\Model\Locacion\Lugar;
use App\Model\Servicio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use PDF;

class HistorialCitaController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		#$userDta = Cita::where('referenceCode', '7278786722')->get();
		#return new Reprogramar($userDta);
		return view('admin.historialCita', ['lugar' => array_add(Lugar::all()->pluck('nombre', 'id'), '', 'Selecionar'), 'fecha' => array_add(Fecha::all()->pluck('fecha'), '', 'Selecionar')]);

	}

	public function buscarCita(Request $request) {
		$fecha = $request->fecha;

		$lugar = $request->lugar;

		$fecha = new Carbon($fecha);

		$f1 = $fecha->format('Y-m-d');

		$fe = Fecha::where('f_fecha', $fecha)->get();
		$id = $fe[0]->id;

		//$id = Cita::all();

		$enviar = DB::table('citas')
			->join('disponibilidads', 'citas.disponibilidad_id', '=', 'disponibilidads.id')
			->join('users', 'citas.paciente_id', '=', 'users.id')
			->join('horas', 'disponibilidads.hora_id', '=', 'horas.id')
			->join('doctor__servicios', 'doctor__servicios.id', '=', 'disponibilidads.doctor_id')
			->join('servicios', 'doctor__servicios.servicio_id', '=', 'servicios.id')
			->where('disponibilidads.lugar_id', $lugar)
			->where('disponibilidads.fecha_id', $id)
			->select('citas.id AS idc', 'users.id', 'servicios.nombre', 'horas.r_hora', 'users.name', 'users.apellidoP', 'users.apellidoM', 'citas.status_asistio', 'citas.idReprogramada', 'citas.status_pago')->get();

		$con = 1;
		return datatables($enviar)
			->addColumn('id', function ($val) use (&$con) {
				return $con++;
			})->addColumn('idcita', function ($val) {
			return $val->idc;
		})->addColumn('servicio', function ($val) {

			return $val->nombre;
		})->addColumn('idU', function ($val) {
			return $val->id;
		})->addColumn('hora', function ($val) {
			return $val->r_hora;
		})->addColumn('nombre', function ($val) {
			return $val->name . ' ' . $val->apellidoP . ' ' . $val->apellidoM;
		})->addColumn('estadopago', function ($val) {
			if ($val->status_pago == 1) {
				return 'Pago';
			} else if ($val->status_pago == 2) {
				return 'Rechazado';
			} else if ($val->status_pago == 3) {
				return 'Pendiente';
			}
		})->addColumn('asistencia', function ($val) {
			if ($val->status_asistio == 2) {
				return "Asistio";
			} else if ($val->status_asistio == 0) {
				return "Falto";
			} else if ($val->status_asistio == 1) {
				return "Programada";
			} else if ($val->status_asistio == 3) {
				return "Reprogramada";
			}
		})->addColumn('reprogramar', function ($val) {
			if ($val->status_pago == 1 && ($val->status_asistio == 0 || $val->status_asistio == 1)) {
				return "<button type='button'  class='editar btn btn-primary'><i class='fa fa-pencil-square-o'></i></button> ";
			} else if ($val->idReprogramada != 1) {
				$enviar1 = DB::table('citas')
					->join('disponibilidads', 'citas.disponibilidad_id', '=', 'disponibilidads.id')
					->where('citas.id', $val->idReprogramada)
					->select('disponibilidads.fecha_id')->get();
				$fecha = Fecha::where('id', $enviar1[0]->fecha_id)->get();
				return $fecha[0]->f_fecha;
			} else {
				return "No ha realizado pago";
			}

		})->rawColumns(['reprogramar'])->make(true);

		//	return response()->json($enviar);
	}

	public function reprogramar(Request $request) {
		$fecha = $request->fecha;

		$lugar = $request->lugar;

		$idpaciente = $request->id;

		$asistencia = $request->asistencia;

		$fecha = new Carbon($fecha);

		$idcita = $request->cita;

		$fecha = $fecha->addWeek();
		$f1 = $fecha->format('Y-m-d');

		$cita = Cita::where('id', $idcita)->get();

		//return response()->json($cita[0]->id);
		//return response()->json($f1);

		//$fe = Fecha::whereMonth('f_fecha', $f1)->get();
		//$id = $fe[0]->id;

		$serid = Servicio::where('nombre', $request->servicio)->get();

		//return response()->json($serid[0]->id);

		//return response()->json($enviar);
		$obtenerF = ' ';
		$b = true;
		$cont = 0;
		$aux = 1;

		//$obtenerF = $fe[$cont]->f_fecha;
		$enviar = DB::table('disponibilidads')
			->join('horas', 'disponibilidads.hora_id', '=', 'horas.id')
			->join('fechas', 'disponibilidads.fecha_id', '=', 'fechas.id')
			->join('lugars', 'disponibilidads.lugar_id', '=', 'lugars.id')
			->join('doctor__servicios', 'doctor__servicios.id', '=', 'disponibilidads.doctor_id')
			->where('lugars.id', $lugar)
			->where('fechas.f_fecha', '>', $f1)
			->where('doctor__servicios.servicio_id', $serid[0]->id)
			->select('fechas.f_fecha', 'doctor__servicios.servicio_id', 'disponibilidads.cantPaciente', 'disponibilidads.status', 'disponibilidads.id')->get();
		//return response()->json($enviar);

		if (count($enviar) == 0) {
			# inserta disponibilidad y inserta en cita

			/*	$slug = str_random(180);
					$insertid = \DB::table('disponibilidads')->insertGetId(['fecha_id' => $fe[$cont]->id, 'lugar_id' => $lugar, 'hora_id' => 0, 'cantPaciente' => 8, 'slug' => $slug, 'status' => 1]);
					$slug = str_random(180);
					$cit = \DB::table('citas')->insertGetId(['disponibilidad_id' => $insertid, 'paciente_id' => $idpaciente, 'slug' => $slug, 'status' => 1, 'status_asistio' => 1]);
				*/

			//return response()->json('no reprogramo prro');

			$aux = 0;
			$b = false;

		} else {

			//return response()->json($enviar);

			$cont2 = 0;
			while ($b && $cont2 != count($enviar)) {
				if ($enviar[$cont2]->cantPaciente != 0 && $enviar[$cont2]->status != 0) {

					//return response()->json('ya casi prro');

					#crea cita en esa disponibilidad
					$slug = str_random(180);
					$insertid = \DB::table('citas')->insertGetId(['disponibilidad_id' => $enviar[$cont2]->id, 'paciente_id' => $idpaciente, 'slug' => $slug, 'status' => 1, 'status_asistio' => 1, 'referenceCode' => $cita[0]->referenceCode, 'processingDate' => $cita[0]->processingDate, 'buyerEmail' => $cita[0]->buyerEmail, 'transactionId' => $cita[0]->transactionId, 'reference_pol' => $cita[0]->reference_pol, 'lapPaymentMethod' => $cita[0]->lapPaymentMethod, 'lapPaymentMethodType' => $cita[0]->lapPaymentMethodType, 'message' => $cita[0]->message, 'transactionState' => $cita[0]->transactionState, 'lapTransactionState' => $cita[0]->lapTransactionState, 'idReprogramada' => 1, 'status_pago' => $cita[0]->status_pago, 'polPaymentMethod' => $cita[0]->polPaymentMethod]);

					$pres = Cita::where('id', $request->cita)->update(['status' => 0, 'status_asistio' => 3, 'idReprogramada' => $insertid]);
					$disp = $enviar[$cont2]->id;
					$can = $enviar[$cont2]->cantPaciente - 1;

					//return response()->json($);
					$pres = Disponibilidad::where('id', $disp)->update(['cantPaciente' => $can]);

					$b = false;
					$user = User::find($idpaciente);
					$cit = Cita::find($insertid);
					Mail::to($user > email)->queue(new Reprogramar($cit));
				}
				$cont2++;
			}

			if ($cont2 < 19 && $b) {
				$aux = 0;
				## insertar disponibilidad y insertar cita
				//return response()->json('no reprogramo prro');
				/*	$slug = str_random(180);
						// encontrar disponibilidad vacia en unmes

						$programado = Disponibilidads::where('lugars.id', $lugar)->where('fechas.id', $fe[$cont]->id)->get();

						$insertid = \DB::table('disponibilidads')->insertGetId(['fecha_id' => $fe[$cont]->id, 'lugar_id' => $lugar, 'hora_id' => $cont2, 'cantPaciente' => 8, 'slug' => $slug, 'status' => 1]);

						$slug = str_random(180);

					*/

				$b = false;

			}

		}

		//$id = Cita::all();
		return response()->json($aux);
		$b = true;
		$con = 0;

		return response()->json($aux);
	}

	public function showpdf(Request $request) {

		//	return view('reports.reciboPdf');
		//$cita = Cita::where('slug', $slug)->get();

		$lugar = $request->lugar;

		$fecha = new Carbon($request->fecha);

		$f1 = $fecha->format('Y-m-d');

		$fe = Fecha::where('f_fecha', $fecha)->get();
		$id = $fe[0]->id;

		$enviar = DB::table('citas')
			->join('disponibilidads', 'citas.disponibilidad_id', '=', 'disponibilidads.id')
			->join('users', 'citas.paciente_id', '=', 'users.id')
			->join('horas', 'disponibilidads.hora_id', '=', 'horas.id')
			->where('disponibilidads.lugar_id', $lugar)
			->where('disponibilidads.fecha_id', $id)
			->select('citas.id AS idc', 'users.id', 'users.dni', 'horas.r_hora', 'users.name', 'users.apellidoP', 'users.apellidoM', 'users.tipo_documento', 'citas.status_asistio', 'citas.referenceCode')->get();

		$pdf = PDF::loadView('reports.historialcitas', ["enviar" => $enviar, "lugar" => $lugar, "fecha" => $request->fecha]);

		$pdf->setPaper('a4', 'portrait')
			->setWarnings(false)
			->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
		//$pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

		//$date_structs = Date::now()->format('Ymdhis');
		$recibo = "Recibo";

		return $pdf->stream($recibo);
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
