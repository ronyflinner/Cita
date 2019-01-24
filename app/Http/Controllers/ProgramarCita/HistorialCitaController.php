<?php

namespace App\Http\Controllers\ProgramarCita;

use App\Http\Controllers\Controller;
use App\Model\Cita;
use App\Model\Disponibilidad;
use App\Model\Fecha;
use App\Model\Locacion\Lugar;
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
			->where('disponibilidads.lugar_id', $lugar)
			->where('disponibilidads.fecha_id', $id)
			->select('citas.id AS idc', 'users.id', 'horas.r_hora', 'users.name', 'citas.status_asistio')->get();

		$con = 1;
		return datatables($enviar)
			->addColumn('id', function ($val) use (&$con) {
				return $con++;
			})->addColumn('idcita', function ($val) {
			return $val->idc;
		})->addColumn('idU', function ($val) {
			return $val->id;
		})->addColumn('hora', function ($val) {
			return $val->r_hora;
		})->addColumn('nombre', function ($val) {
			return $val->name;
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
			if ($val->status_asistio == 0 || $val->status_asistio == 1) {
				return "<button type='button'  class='editar btn btn-primary'><i class='fa fa-pencil-square-o'></i></button> ";
			}

			return " ";

		})->rawColumns(['reprogramar'])->make(true);

		//	return response()->json($enviar);
	}

	public function reprogramar(Request $request) {
		$fecha = $request->fecha;

		$lugar = $request->lugar;

		$idpaciente = $request->id;

		$asistencia = $request->asistencia;

		if ($asistencia == "Programada") {
			$pres = Cita::where('id', $request->cita)->update(['status' => 0, 'status_asistio' => 3]);
		}

		$fecha = new Carbon($fecha);

		$fecha = $fecha->addMonth(1);
		$f1 = $fecha->format('m');

		//return response()->json($f1);

		$fe = Fecha::whereMonth('f_fecha', $f1)->get();
		//$id = $fe[0]->id;

		//	return response()->json($fe[0]->id);

		//return response()->json($enviar);
		$obtenerF = ' ';
		$b = true;
		$cont = 0;
		while ($b) {
			$obtenerF = $fe[$cont]->f_fecha;
			$enviar = DB::table('disponibilidads')
				->join('horas', 'disponibilidads.hora_id', '=', 'horas.id')
				->join('fechas', 'disponibilidads.fecha_id', '=', 'fechas.id')
				->join('lugars', 'disponibilidads.lugar_id', '=', 'lugars.id')
				->where('lugars.id', $lugar)
				->where('fechas.id', $fe[$cont]->id)
				->select('disponibilidads.cantPaciente', 'disponibilidads.status', 'disponibilidads.id')->get();
			//return response()->json($enviar[0]->cantPaciente);
			if (count($enviar) == 0) {
				# inserta disponibilidad y inserta en cita

				$slug = str_random(180);
				$insertid = \DB::table('disponibilidads')->insertGetId(['fecha_id' => $fe[$cont]->id, 'lugar_id' => $lugar, 'hora_id' => 0, 'cantPaciente' => 8, 'slug' => $slug, 'status' => 1]);
				$slug = str_random(180);
				$cit = \DB::table('citas')->insertGetId(['disponibilidad_id' => $insertid, 'paciente_id' => $idpaciente, 'slug' => $slug, 'status' => 1, 'status_asistio' => 1]);

				$b = false;

			} else {

				$cont2 = 0;
				while ($b && $cont2 != count($enviar)) {
					if ($enviar[$cont2]->cantPaciente != 0 && $enviar[$cont2]->status != 0) {

						#crea cita en esa disponibilidad
						$slug = str_random(180);
						$insertid = \DB::table('citas')->insertGetId(['disponibilidad_id' => $enviar[$cont2]->id, 'paciente_id' => $idpaciente, 'slug' => $slug, 'status' => 1, 'status_asistio' => 1]);

						$disp = $enviar[$cont2]->id;
						$can = $enviar[$cont2]->cantPaciente - 1;

						//return response()->json($);
						$pres = Disponibilidad::where('id', $disp)->update(['cantPaciente' => $can]);

						$b = false;
					}
					$cont2++;
				}

				if ($cont2 < 9 && $b) {
					## insertar disponibilidad y insertar cita
					return response()->json('reprogramado');
					$slug = str_random(180);

					$insertid = \DB::table('disponibilidads')->insertGetId(['fecha_id' => $fe[$cont]->id, 'lugar_id' => $lugar, 'hora_id' => $cont2, 'cantPaciente' => 8, 'slug' => $slug, 'status' => 1]);

					$slug = str_random(180);

					$cit = \DB::table('citas')->insertGetId(['disponibilidad_id' => $insertid, 'paciente_id' => $idpaciente, 'slug' => $slug, 'status' => 1, 'status_asistio' => 1]);

					$b = false;

				}

			}

			$cont++;

		}
		//$id = Cita::all();
		return response()->json($obtenerF);
		$b = true;
		$con = 0;

		return response()->json($fe);
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
			->select('citas.id AS idc', 'users.id', 'horas.r_hora', 'users.name', 'citas.status_asistio')->get();

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
