<?php

namespace App\Http\Controllers\CrearCita;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traitsGeneral\principal;
use App\Model\Cita;
use App\Model\Disponibilidad;
use App\Model\Fecha;
use App\Model\Locacion\Lugar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;

class CrearCitaController extends Controller {
	use principal;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		/*$years = Date::now()->format('Y');

			foreach (self::cargarFecha($years, 1) as $key => $value) {
				# code...
				Fecha::create(['f_fecha' => $value, 'slug' => str_random(120)]);
		*/

		return view('cita.crearcita', ['lugar' => array_add(Lugar::all()->pluck('nombre', 'id'), '', 'Selecionar')]);
	}

	public function ajaxBuscarHora(request $request) {

		if ($request->ajax()) {
			$fecha_buscar = $request->data;
			$lugar = $request->lugar;

			$Disponibilidad = Disponibilidad::orderBy('id', 'DESC')->where('lugar_id', $lugar)->where('status', 1)
				->whereHas('fecha_link', function ($query) use ($fecha_buscar) {
					$query->where('f_fecha', $fecha_buscar);
				})->with('hora_link')
				->get()->pluck('hora_link.r_hora', 'id');

			return response()->json($Disponibilidad);
		}
	}

	public function ajaxCrearCitaFecha(request $request, $lugar_id) {
		if ($request->ajax()) {

			$contenedor_fecha = array();
			/*Definiendo variables*/
			$dateA = "2019-01-15";
			$bandera = 0;
			$r = 0;
			/**/
			$fecha_final = Fecha::latest('f_fecha')->first();
			/*COnvirtiendo fechas de Base de datos  a una instancia de carbon*/
			$fecha_final_carbon_y = Date::createFromFormat('Y-m-d', $fecha_final->f_fecha)->format('Y');
			$fecha_final_carbon_m = Date::createFromFormat('Y-m-d', $fecha_final->f_fecha)->format('m');
			$fecha_final_carbon_d = Date::createFromFormat('Y-m-d', $fecha_final->f_fecha)->format('d');

			/*Fragmentando la fechas */
			$fecha_inicial_d = Date::now()->format('d');
			$fecha_inicial_m = Date::now()->format('m');
			$fecha_inicial_y = Date::now()->format('Y');

			/*Recorriendo las fechas*/
			$dtINI = Carbon::create($fecha_inicial_y, $fecha_inicial_m, $fecha_inicial_d, 0, 0, 0, 'America/Lima');
			$dtEND = Carbon::create($fecha_final_carbon_y, $fecha_final_carbon_m, $fecha_final_carbon_d, 0, 0, 0, 'America/Lima');

			/*Obtener Rango de fecha*/
			$rango_fecha = self::generateDateRange($dtINI, $dtEND);

			/*Recorriendo el arreglo de rango de fechas*/

			foreach ($rango_fecha as $key => $value) {

				/*Consultar fechas del rango para buscar el ID*/
				$query_fecha = DB::table('fechas')->where('f_fecha', $value)->get();

				if ($query_fecha->count() > 0) {
					/*Crear Arreglo del Data picker*/
					$fecha_disponible = Disponibilidad::where('lugar_id', $lugar_id)->where('fecha_id', $query_fecha[0]->id)->where('cantPaciente', '!=', 0)->where('status', 1)->get();

					if ($fecha_disponible->count() == 0) {
						$contenedor_fecha[$r] = $value;
					}
				} else {
					$contenedor_fecha[$r] = $value;
				}

				$r++;

			}
			/*Verificanddo si se dispone cita*/
			if (count($rango_fecha) == count($contenedor_fecha)) {
				$direccion = "<h3 class='alert-danger'> No se han aperturado Citas para la Sede selecionada. </h3>";
				$bandera = 0;

			} else {
				$direccion_query = Lugar::find($lugar_id);

				$direccion = "<label for='sel1'>Dirección del Lugar:</label>";
				$direccion .= "<h3>" . $direccion_query->nombre . "</h3>";
				$direccion .= "<p>" . $direccion_query->direccion . "<p>";
				$bandera = 1;
			}

			return response()->json(["contenedor_fecha" => $contenedor_fecha, 'contenedor_fechaFinal' => $fecha_final->f_fecha, 'contenedor_lugar' => $direccion, 'verificacion' => $direccion, 'bandera' => $bandera]);

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
		$yeah = 0;
		$disponbilidad = '';

		$disponbilidadCita = Cita::where('paciente_id', Auth::id())->where('status', 1)->get();

		if ($disponbilidadCita->count() > 0) {
			$yeah = 2; // error de existencia de cita activa
			$disponbilidad = $disponbilidadCita;
		} else {

			$disponbilidad = Disponibilidad::find($request->hora);

			if ($disponbilidad->cantPaciente > 0) {
				/*Decrementar la cantidad de cita*/
				$disponbilidad->cantPaciente = $disponbilidad->cantPaciente - 1;
				$disponbilidad->save();

				Cita::create([
					'disponibilidad_id' => $request->hora,
					'paciente_id' => Auth::id(),
					'status_asistio' => 0,
					'status' => 1, //cita activa
					'slug' => str_random(120)]);

				$yeah = 1; // Su cita fue correctamente creada
			} else {
				$yeah = 0; // error, cita fue tomada.
			}

		}

		return response()->json(["dispo" => $disponbilidad, 'yeah' => $yeah]);
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
