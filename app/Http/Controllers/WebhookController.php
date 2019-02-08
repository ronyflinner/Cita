<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller {
	public function handle(Request $request) {
		// Aqui ejecuta tu accion
		Log::info($request->all());
	}
}
