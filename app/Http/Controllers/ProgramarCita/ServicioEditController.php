<?php

namespace App\Http\Controllers\ProgramarCita;

use App\Http\Controllers\Controller;
use App\Model\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioEditController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.servicio');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	public function editarServicio(Request $request) {

		$slug = str_random(180);
		$costo = (float) $request->costo;
		$insertid = \DB::table('servicios')->insertGetId(
			['nombre' => $request->nombre, 'costo' => $costo, 'slug' => $slug]);
		return response()->json($insertid);
	}

	public function mostrarServicio(Request $request) {

		$enviar = Servicio::all();
		return $enviar;
		$con = 1;
		return datatables($enviar)
			->addColumn('id', function ($val) use (&$con) {
				return $con++;
			})->addColumn('nombre', function ($val) {
			return $val->nombre;
		})->addColumn('costo', function ($val) {
			return $val->costo;
		});

		return " ";

	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
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
