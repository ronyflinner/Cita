<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {
	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'\App\Console\Commands\TestLog',
		'\App\Console\Commands\RecordatorioCita', #Importando Clase de Correo a recordar
		'\App\Console\Commands\CargaFecha',
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule) {
		// $schedule->command('inspire')
		//          ->hourly();
		//$schedule->command('logs:test')->daily()->timezone('America/Lima');

		$schedule->command('users:recordar')->weeklyOn(6, '23:45')->timezone('America/Lima');
		//$schedule->command('users:recordar')->everyMinute();
		$schedule->command('fecha:cargar')->monthlyOn(9, '15:00')->timezone('America/Lima'); // Llamando al comando que pertenece a la class
		//->everyMinute();
	}

	/**
	 * Register the commands for the application.
	 *
	 * @return void
	 */
	protected function commands() {
		$this->load(__DIR__ . '/Commands');

		require base_path('routes/console.php');
	}
}
