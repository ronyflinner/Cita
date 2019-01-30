<?php

namespace App\Http\Controllers;

use Alexo\LaravelPayU\LaravelPayU;

class PaymentsControlle extends Controller {
	public function cococ() {

		LaravelPayU::doPing(function ($response) {
			$code = $response->code;
			// ... revisar el codigo de respuesta
		}, function ($error) {
			// ... Manejo de errores PayUException
		});
	}
}
