<?php

namespace App\Console\Commands;

use App\Mail\RecordarCita;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

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
		Mail::to('luiskaco@gmail.com')->queue(new RecordarCita);
	}
}
