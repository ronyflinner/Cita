<?php

namespace App\Http\Controllers\Asistencia;

use App\Http\Controllers\Controller;
use App\Model\Cita;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class VerificadorController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('asistente.verificar');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function buscar(Request $request) {

		$cita = Cita::where('referenceCode', $request->id)->where('status', 1)->get();
		$user = User::where('id', $cita[0]->paciente_id)->get();
		return response()->json(['nombre' => $user[0]->name, 'apellidoP' => $user[0]->apellidoP, 'apellidoM' => $user[0]->apellidoM, 'dni' => $user[0]->dni, 'numero' => $user[0]->numero, 'status_asistio' => $cita[0]->status_asistio, 'status_pago' => $cita[0]->status_pago]);
	}

	public function asistencia(Request $request) {
		$pres = Cita::where('referenceCode', $request->id)->update(['status_asistio' => 0]);
		return response()->json('hola');
	}
	public function create() {
		//
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
