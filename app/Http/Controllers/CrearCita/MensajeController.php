<?php

namespace App\Http\Controllers\CrearCita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MensajeController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('cita.listamensaje');
	}

	public function list_mensaje(Request $request) {
		if ($request->ajax()) {
			$enviar = DB::table('contactos')
				->join('users', 'contactos.paciente_id', '=', 'users.id')->select('contactos.mensaje', 'users.name', 'users.apellidoP', 'users.apellidoM', 'users.email')->get();

			$r = 0;
			return Datatables($enviar)
				->addColumn('id', function ($val) use (&$r) {
					return ++$r;
				})
				->addColumn('paciente', function ($val) {
					return $val->name . $val->apellidoP . $val->apellidoM;
				})
				->addColumn('mensaje', function ($val) {
					return $val->mensaje;

				})->addColumn('responder', function ($val) {

				return " <a href='mailto:" . $val->email . "'><button type='button'  class='editar btn btn-primary'><i class='fa fa-pencil-square-o'></i></button></a>";

			})->rawColumns(['responder'])->make(true);
		}

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
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
