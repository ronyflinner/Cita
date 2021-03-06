<?php

namespace App\Http\Controllers\ProgramarCita;

use App\Http\Controllers\Controller;
use App\Model\Disponibilidad;
use App\Model\Fecha;
use App\Model\Hora;
use App\Model\Locacion\Lugar;
use App\Model\Servicio;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

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

		$lugar = $request->lugar;
		$doctor = $request->doctor;

		$fechas = $request->id;
		$fecha1 = substr($fechas, 0, 10);
		$fecha2 = substr($fechas, 14, 24);

		$fecha1 = new Carbon($fecha1);
		$fecha2 = new Carbon($fecha2);

		$f1 = $fecha1->format('Y-m-d');
		$f2 = $fecha2->format('Y-m-d');

		$la = DB::table('fechas')->whereBetween('f_fecha', array($f1, $f2))->get();
		$ho = Hora::all();

		$arr = array('fecha' => $la, 'hora' => $ho);

		foreach ($la as $fecha) {
			foreach ($ho as $hora) {
				$slug = str_random(180);

				$dispo = Disponibilidad::where('fecha_id', $fecha->id)->where('doctor_id', $doctor)->where('hora_id', $hora->id)->where('lugar_id', $lugar)->get();

				if (count($dispo) == 0) {
					// creas
					$dt = Carbon::parse($fecha->f_fecha);
					if ($dt->dayOfWeek == 6) {
						if ($hora->id <= 26) {
							$insertid = \DB::table('disponibilidads')->insertGetId(
								['fecha_id' => $fecha->id, 'lugar_id' => $lugar, 'hora_id' => $hora->id, 'cantPaciente' => 5, 'slug' => $slug, 'status' => 1, 'doctor_id' => $doctor]);
						}
					} else {
						$insertid = \DB::table('disponibilidads')->insertGetId(
							['fecha_id' => $fecha->id, 'lugar_id' => $lugar, 'hora_id' => $hora->id, 'cantPaciente' => 5, 'slug' => $slug, 'status' => 1, 'doctor_id' => $doctor]);
					}

				}
			}
		}

		return response()->json(-1);
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
		$servicio = $request->servicio + 1;

		$actualizar = $request->actualizar;
		$slug = str_random(180);

		$o_fecha = Fecha::where('f_fecha', $fecha)->get();
		$fecha = $o_fecha[0]->id;

		$o_hora = Hora::where('r_hora', $hora)->get();
		$hora = $o_hora[0]->id;

		/*	$doctor2 = Doctor_Servicio::where('id', $doctor)->get();
		$dispo = Disponibilidad::where('fecha_id', $fecha)->where('lugar_id', $lugar)->where('doctor_id', $doctor2[0]->doctor_id)->where('hora_id', $hora)->get(); // si existe registro*/
		//return response()->json($dispo[0]->id);
		// debo buscar para ese doctor si tiene otro sercivio con la misma fecha

		//return response()->json($iddo);
		$enviar2 = DB::table('doctor__servicios')
			->join('disponibilidads', 'doctor__servicios.id', '=', 'disponibilidads.doctor_id')
			->join('servicios', 'doctor__servicios.servicio_id', '=', 'servicios.id')
			->where('disponibilidads.hora_id', $hora)
			->where('disponibilidads.doctor_id', $doctor)
			->where('disponibilidads.fecha_id', $fecha)
			->select('disponibilidads.status', 'servicios.id', 'disponibilidads.lugar_id', 'disponibilidads.id AS iddis')->get(); // solo deberia botar uno o nada .

		if (sizeof($enviar2) == 1) {
			//return response()->json($enviar2[0]->id . " " . $servicio);
			// si es el mismo
			if ($enviar2[0]->lugar_id == $lugar && $enviar2[0]->id == $servicio) {
				//return response()->json('hola');
				$pres = Disponibilidad::where('id', $enviar2[0]->iddis)->first();
				$pres->delete();
				return response()->json(1);
			} else {
				return response()->json(9);
			}

		} else {
			$actualizar = 0;
			//return response()->json("hoi");
			$insertid = \DB::table('disponibilidads')->insertGetId(
				['fecha_id' => $fecha, 'lugar_id' => $lugar, 'hora_id' => $hora, 'cantPaciente' => 5, 'slug' => $slug, 'status' => 1, 'doctor_id' => $doctor]);
			return response()->json(0);
		}
		/*	if (count($dispo) == 0) {
				$actualizar = 0;
				//return response()->json("hoi");
				$insertid = \DB::table('disponibilidads')->insertGetId(
					['fecha_id' => $fecha, 'lugar_id' => $lugar, 'hora_id' => $hora, 'cantPaciente' => 5, 'slug' => $slug, 'status' => 1, 'doctor_id' => $doctor]);
				return response()->json(0);
			} else {
				//return response()->json($o_hora[0]->id);
				// edito
				if (sizeof($enviar2) == 1) {
					$aux = 9;
					if ($enviar2[0]->iddis == $dispo[0]->id) {
						$aux = 0;
					}
					/* nooo $aux = 0;
						foreach ($enviar2 as $val) {
							if ($val->iddis == $dispo[0]->id) {
								$aux = 0;
							} else if ($val->id != $servicio && $val->lugar_id != $lugar) {
								$aux = 9;
							}
		*/
		/*	if ($aux == 9) {
					return response()->json(9);
				} else {
					$cam = 1;
					$actualizar = $dispo[0]->status;
					if ($dispo[0]->status == 1) {
						$cam = 0;
					} else {
						$cam = 1;
					}
					$pres = Disponibilidad::where('id', $dispo[0]->id)->update(['status' => $cam]);
					return response()->json(1);
				}

			}

		} */

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

	public function importUsers(Request $request) {

		\Excel::load($request->excel, function ($reader) {

			$excel = $reader->get();

			// iteracción
			$reader->each(function ($row) {

				$user = new User;
				$user->name = $row->nombre;
				$user->apellidoP = $row->nombre;
				$user->apellidoM = $row->nombre;
				$user->tipo_documento = 1;
				$user->dni = 76123243;
				$user->numero = 920265098;
				$user->email = $row->email;
				$user->password = bcrypt('secret');
				$user->slug = 'jdjdkdj98jum';
				$user->tipo = 1;
				$user->status = 1;
				$user->save();
			});

		});

		return "Terminado";
	}

}
