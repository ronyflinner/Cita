<?php

namespace App\Http\Controllers\Pagos;

use App\Http\Controllers\Controller;
use Culqi\Culqi;
use Illuminate\Http\Request;

class CulquiController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function cargo(Request $request) {

		$SECRET_KEY = "sk_test_UJq6Dpm855bjvdqo";
		$culqi = new Culqi(array('api_key' => $SECRET_KEY));

		try {
			$charge = $culqi->Charges->create(
				array(
					"amount" => 1500,
					"currency_code" => "PEN",
					"email" => "test_charge@culqi.com",
					"source_id" => $request->tokenCukqui,
				)
			);
			return response()->json(['correcto' => 1, 'data' => $charge]);

		} catch (Exception $e) {

			$cargo2 = $e->getMessage();

			return response()->json($cargo2);

		}

	}
	public function orden(Request $request) {
		return $request->all();
	}

}
