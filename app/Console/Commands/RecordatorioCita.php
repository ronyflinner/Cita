<?php

namespace App\Console\Commands;

use App\Mail\RecordarCita;
use App\Model\Cita;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Date\Date;

class RecordatorioCita extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'users:recordar';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Comando que permite activar la acción de recordar cita';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		//

		$datePeru = Date::now('America/Lima');

		$inicio = $datePeru->startOfWeek(Carbon::MONDAY)->format('Y-m-d');
		$final = $datePeru->endOfWeek(Carbon::SATURDAY)->format('Y-m-d');
		//$fecha = Fecha::whereBetween('f_fecha', [$inicio, $final])->get();

		$cita = Cita::where('status', 1)->where('status_pago', 1)->where('status_asistio', 1)->get();

		if (count($cita) > 0) {
			foreach ($cita as $value) {

				$fechaCarbon = new Carbon($value->disponibilidad_link->fecha_link->f_fecha);

				if ($fechaCarbon->greaterThan($inicio) && $fechaCarbon->lessThan($final)) {

					Mail::to($value->paciente_link->email)->queue(new RecordarCita($value));
					//return new RecordarCita($cita);

				}

			}

			Log::info('Se enviaron todos los correos!!! ');

		} else {
			Log::info('No se han podido enviar todos los correos!!!');
		}

	}
}
