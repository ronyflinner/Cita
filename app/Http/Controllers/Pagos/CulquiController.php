<?php

namespace App\Http\Controllers\Pagos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CulquiController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function cargo(Request $request) {
		return $request->all();

		$SECRET_KEY = "sk_test_uZSP1djdTqhcSmt2";
		$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

		$charge = $culqi->Charges->create(
			array(
				"amount" => 1500,
				"currency_code" => "PEN",
				"email" => "test_charge@culqi.com",
				"source_id" => "id del objeto Token o id del objeto Card",
			)
		);

//Respuesta
		print_r($charge);
	}
	public function orden(Request $request) {
		return $request->all();
	}

}
