<?php

namespace App\Http\Controllers\ProgramarCita;

use App\Http\Controllers\Controller;
use App\Model\Disponibilidad;
use App\Model\Fecha;
use App\Model\Hora;
use App\Model\Locacion\Lugar;
use App\Model\Servicio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramarCitaController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		return view('admin.programarCita', ['lugar' => array_add(Lugar::all()->pluck('nombre', 'id'), '', 'Selecionar'), 'fecha' => array_add(Fecha::all()->pluck('fecha'), '', 'Selecionar'), 'servicio' => array_add(Servicio::all()->pluck('nombre'), '', 'Selecionar')]);
	}

	public function data_range($value, $condition = 1) {

		if ($condition == 1) {
			/*Fecha*/
			$prt = explode("-", $value);
			$prt_change_a = trim(str_replace("/", "-", $prt[0]));
			$prt_change_b = trim(str_replace("/", "-", $prt[1]));

			$prt_change_as = new Carbon($prt_change_a);
			$prt_change_bs = new Carbon($prt_change_b);
			return [$prt_change_as, $prt_change_bs];
		}
	}

	public function bdoctor(Request $request) {
		$id = $request->id + 1;
		$users = DB::table('doctor__servicios')
			->join('users', 'users.id', '=', 'doctor__servicios.usuario_id')
			->join('servicios', 'servicios.id', '=', 'doctor__servicios.servicio_id')
			->where('servicios.id', $id)
			->select('users.name', 'doctor__servicios.id')->get();

		return response()->json($users);
	}
	public function statusEdit(request $request) {
		//return response()->json($request->input('id'));
		$fechas = $request->id;

		//return response()->json($fechas);

		//return response()->json($fecha1);
		//$prueba = Fecha::whereBetween('f_fecha', [$f1, $f2])->get();
		//$h = $fecha1 . " " . $fecha2;

		//return response()->json($prueba[0]->id);

		$fecha1 = substr($fechas, 0, 10);
		$fecha2 = substr($fechas, 14, 24);

		$fecha1 = new Carbon($fecha1);
		$fecha2 = new Carbon($fecha2);

		$f1 = $fecha1->format('Y-m-d');
		$f2 = $fecha2->format('Y-m-d');

		$la = DB::table('fechas')->whereBetween('f_fecha', array($f1, $f2))->get();
		$ho = Hora::all();

		$arr = array('fecha' => $la, 'hora' => $ho);

		return $arr;

		$users = DB::table('disponibilidads')
			->join('horas', 'disponibilidads.hora_id', '=', 'horas.id')
			->join('fechas', 'disponibilidads.fecha_id', '=', 'fechas.id')
			->join('lugars', 'disponibilidads.lugar_id', '=', 'lugars.id')
			->join('doctor__servicios', 'doctor__servicios.id', '=', 'disponibilidads.doctor_id')
			->where('lugars.id', $lugar)
			->where('disponibilidads.doctor_id', $lugar)
			->whereBetween('fechas.f_fecha', array($f1, $f2))
			->select('fechas.f_fecha', 'horas.r_hora', 'disponibilidads.status')->get();

		/*	  $users = DB::table('disponibilidads')
			->join('horas', 'disponibilidads.hora_id', '=', 'horas.id')
			->join('fechas', 'disponibilidads.fecha_id', '=', 'fechas.id')
			->join('lugars', 'disponibilidads.lugar_id', '=', 'lugars.id')
			->where('lugars.id', 1)
			->whereBetween('fechas.f_fecha', array($f1, $f2))
			->select('fechas.f_fecha', 'horas.r_hora', 'disponibilidads.status')->get();
     */
		return response()->json($users);

		return response()->json($prueba);
		$sta = Fecha::all()->pluck('f_fecha');

		return response()->json($sta);
	}

	public function buscarFecha(Request $request) {
		$fecha = $request->fecha;
		$lugar = $request->lugar;
		$doctor = $request->doctor;

		$fe = Fecha::where('f_fecha', $fecha)->get();
		$id = $fe[0]->id;

		$disponibilidads = Disponibilidad::where('fecha_id', $id);
		if (empty($disponibilidads)) {
			$enviar = 0;
		} else {
			$enviar = DB::table('disponibilidads')
				->join('horas', 'disponibilidads.hora_id', '=', 'horas.id')
				->join('fechas', 'disponibilidads.fecha_id', '=', 'fechas.id')
				->join('lugars', 'disponibilidads.lugar_id', '=', 'lugars.id')
				->join('doctor__servicios', 'doctor__servicios.id', '=', 'disponibilidads.doctor_id')
				->where('lugars.id', $lugar)
				->where('fechas.id', $id)
				->where('disponibilidads.doctor_id', $doctor)
				->select('fechas.f_fecha', 'horas.r_hora', 'disponibilidads.status')->get();
			//$enviar = 0;

		}
		return response()->json($enviar);
	}

	public function editarDispon(Request $request) {
		$fecha = $request->fecha;
		$lugar = $request->lugar;
		$hora = $request->hora;
		$doctor = $request->doctor;
		$actualizar = $request->actualizar;
		$slug = str_random(180);

		$o_fecha = Fecha::where('f_fecha', $fecha)->get();
		$fecha = $o_fecha[0]->id;

		$o_hora = Hora::where('r_hora', $hora)->get();
		$hora = $o_hora[0]->id;
		//return response()->json($o_hora[0]->id);

		$dispo = Disponibilidad::where('fecha_id', $fecha)->where('lugar_id', $lugar)->where('doctor_id', $doctor)->where('hora_id', $hora)->get();

		if (count($dispo) == 0) {
			// inserto
			$actualizar = 0;
			$insertid = \DB::table('disponibilidads')->insertGetId(
				['fecha_id' => $fecha, 'lugar_id' => $lugar, 'hora_id' => $hora, 'cantPaciente' => 5, 'slug' => $slug, 'status' => 1, 'doctor_id' => $doctor]);

		} else {
			//return response()->json($o_hora[0]->id);
			// edito
			$cam = 1;
			$actualizar = $dispo[0]->status;
			if ($dispo[0]->status == 1) {
				$cam = 0;
			} else {
				$cam = 1;
			}
			$pres = Disponibilidad::where('id', $dispo[0]->id)->update(['status' => $cam]);
		}
		return response()->json($actualizar);
	}

	public function editarDispon2(Request $request) {
		$fecha = $request->fecha;
		$lugar = $request->lugar;
		$hora = $request->hora;
		$doctor = $request->doctor;

		$actualizar = $request->actualizar;
		$slug = str_random(180);

		$o_fecha = Fecha::where('f_fecha', $fecha)->get();
		$fecha = $o_fecha[0]->id;

		$o_hora = Hora::where('r_hora', $hora)->get();
		$hora = $o_hora[0]->id;
		//return response()->json($o_hora[0]->id);

		$dispo = Disponibilidad::where('fecha_id', $fecha)->where('lugar_id', $lugar)->where('doctor_id', $doctor)->where('hora_id', $hora)->get();

		if (count($dispo) == 0) {
			// inserto
			$actualizar = 0;
			$insertid = \DB::table('disponibilidads')->insertGetId(
				['fecha_id' => $fecha, 'lugar_id' => $lugar, 'hora_id' => $hora, 'cantPaciente' => 5, 'slug' => $slug, 'status' => 1, 'doctor_id' => $doctor]);

		} else {
			//return response()->json($o_hora[0]->id);
			// edito
			$cam = 1;
			$actualizar = $dispo[0]->status;
			if ($dispo[0]->status == 1) {
				$cam = 0;
			} else {
				$cam = 1;
			}
			$pres = Disponibilidad::where('id', $dispo[0]->id)->update(['status' => $cam]);
		}
		return response()->json($actualizar);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

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
