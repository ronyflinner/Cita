<?php

namespace App\Http\Controllers\ProgramarCita;

use App\Http\Controllers\Controller;
use App\Model\Fecha;
use App\Model\Locacion\Lugar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
			->where('citas.status', 1)
			->select('horas.r_hora', 'users.name', 'citas.status_asistio')->get();

		$con = 1;
		return datatables($enviar)
			->addColumn('id', function ($val) use (&$con) {
				return $con++;
			})
			->addColumn('hora', function ($val) {
				return $val->r_hora;
			})->addColumn('nombre', function ($val) {
			return $val->name;
		})->addColumn('asistencia', function ($val) {
			if ($val->status_asistio == 1) {
				return "Asistio";
			} else {
				return "Falto";
			}
		})->addColumn('reprogramar', function ($val) {
			return "<button type='button'  class='editar btn btn-primary'><i class='fa fa-pencil-square-o'></i></button> ";
		})->rawColumns(['reprogramar'])->make(true);

		//	return response()->json($enviar);
	}

	public function reprogramar(Request $request) {
		$fecha = $request->fecha;

		$lugar = $request->lugar;

		$fecha = new Carbon($fecha);

		$fecha = $fecha->addMonth(1);
		$f1 = $fecha->format('m');

		//return response()->json($f1);

		$fe = Fecha::whereMonth('f_fecha', $f1)->get();
		//$id = $fe[0]->id;
		$enviar = DB::table('disponibilidads')
			->join('horas', 'disponibilidads.hora_id', '=', 'horas.id')
			->join('fechas', 'disponibilidads.fecha_id', '=', 'fechas.id')
			->join('lugars', 'disponibilidads.lugar_id', '=', 'lugars.id')
			->where('lugars.id', $lugar)
			->where('fechas.id', $fe[0]->id)
			->select('disponibilidads.cantPaciente', 'disponibilidads.status')->get();

		return response()->json($enviar);

		$b = true;
		$cont = 0;
		while ($b) {
			$enviar = DB::table('disponibilidads')
				->join('horas', 'disponibilidads.hora_id', '=', 'horas.id')
				->join('fechas', 'disponibilidads.fecha_id', '=', 'fechas.id')
				->join('lugars', 'disponibilidads.lugar_id', '=', 'lugars.id')
				->where('lugars.id', $lugar)
				->where('fechas.id', $fe[$cont]->id)
				->select('disponibilidads.cantPaciente', 'disponibilidads.status')->get();

			if (count($enviar) == 0) {
				# inserta disponibilidad y inserta en cita

				$insertid = \DB::table('disponibilidads')->insertGetId(['fecha_id' => $fe[$cont]->id, 'lugar_id' => $lugar, 'hora_id' => $hora, 'cantPaciente' => 8, 'slug' => $slug, 'status' => 1]);

				$b = false;

			} else {
				$cont2 = 0;
				while ($b) {
					if ($enviar[$cont2]->cantPaciente != 0 && $enviar->status != 1) {
						#crea cita en esa disponibilidad
						$b = false;
					}
					$cont2++;
				}

				if ($cont2 < 10 && $b) {
					## insertar disponibilidad y insertar cita
				}

			}

			$cont++;

		}
		//$id = Cita::all();
		return response()->json($fe[0]->id);
		$b = true;
		$con = 0;

		return response()->json($fe);
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
