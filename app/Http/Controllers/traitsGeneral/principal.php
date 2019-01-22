<?php
namespace App\Http\Controllers\traitsGeneral;

use App\Model\Disponibilidad;
use App\Model\Fecha;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;

trait principal {
	/*trait*/
	public function generateDateRange(Carbon $start_date, Carbon $end_date) {
		$dates = [];for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
			$dates[] = $date->format('Y-m-d');
		}
		return $dates;
	}
	public function busquedaFechas() {
		$contenedor_fecha = array();
		$dateA = "2019-01-15";
		$fecha_final = Fecha::all()->last();
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
		$r = 0;
		foreach ($rango_fecha as $key => $value) {

			/*Consultar fechas del rango para buscar el ID*/
			$query_fecha = DB::table('fechas')->where('f_fecha', $value)->get();

			if ($query_fecha->count() > 0) {
				/*Crear Arreglo del Data picker*/
				$fecha_disponible = Disponibilidad::where('lugar_id', 1)->where('fecha_id', $query_fecha[0]->id)->where('cantPaciente', '!=', 0)->get();

				if ($fecha_disponible->count() == 0) {
					$contenedor_fecha[$r] = $value;
				}
			} else {
				$contenedor_fecha[$r] = $value;
			}

			$r++;

		}

		foreach ($contenedor_fecha as $key => $value) {
			$quitando_llaves[] = $value;
		}
		return [$quitando_llaves, $fecha_final->f_fecha];
		return array_divide($contenedor_fecha);
	}

	/*Cargar años*/
	public function cargarFecha($years, $condition = null) {

		//$firtDayYears = Date::createFromDate($years, 1, 1)->format('Y-m-d');
		//$LastDayYears = Date::createFromDate($years, 12, 31)->format('Y-m-d');
		$firtDayYears = Date::create($years, 1, 1, 0, 0, 0, 'America/Lima');
		$LastDayYears = Date::create($years, 12, 31, 0, 0, 0, 'America/Lima');
		$FechasRangeArreglo = self::generateDateRange($firtDayYears, $LastDayYears);

		foreach ($FechasRangeArreglo as $key => $value) {
			# code...
			$explo_fecha = explode('-', $value);
			$feArreglo = Date::create($explo_fecha[0], $explo_fecha[1], $explo_fecha[2], 0, 0, 0, 'America/Lima')->dayOfWeek;

			if ($feArreglo != 0 && $feArreglo != 6) {
				$fechaR[] = $value;
			}

		}
		return $fechaR;
	}

	/*Limpiar variables.*/
	public function unset_clean($value) {
		if (!empty($value)) {
			unset($value);
		}
	}
}