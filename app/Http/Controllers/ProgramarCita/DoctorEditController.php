<?php

namespace App\Http\Controllers\ProgramarCita;

use App\Http\Controllers\Controller;
use App\Model\Servicio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorEditController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.doctoredit', ['usuario' => array_add(User::where('tipo', 3)->get()->pluck('NombreCompleto', 'id'), '', 'Selecionar')]);
	}

	public function buscarservicio(Request $request) {
		$doctor_ser = DB::table('doctor__servicios')
			->join('servicios', 'doctor__servicios.servicio_id', '=', 'servicios.id')
			->where('doctor__servicios.usuario_id', $request->usuario)
			->select('servicios.nombre')->get();
		$servicio = Servicio::all();
		return response()->json(['servicios' => $servicio, 'doctorser' => $doctor_ser]);
	}

	public function editardoc(Request $request) {
		return response()->json($request->servicio);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

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
