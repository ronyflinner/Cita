<?php

namespace App\Console\Commands;

use App\Http\Controllers\traitsGeneral\principal;
use App\Model\Fecha;
use Illuminate\Console\Command;
use Jenssegers\Date\Date;

class CargaFecha extends Command {
	use principal;
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'fecha:cargar';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'comando para la carga del año siguiente';

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
		$years = Date::now()->addYear()->format('Y');
		foreach (self::cargarFecha($years, 1) as $key => $value) {
			# code...
			Fecha::create(['f_fecha' => $value, 'slug' => str_random(120)]);

		}
	}
}
