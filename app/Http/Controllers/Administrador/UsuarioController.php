<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traitsGeneral\principal;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller {
	use principal;
	private $btnStatus;
	private $btnEdit;
	private $btnAsign;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		//return self::conversionAmPM('17:30');
		return view('admin.usuario.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$role = array_add(Role::all()->pluck('name', 'id'), "", "Selecionar");

		$tipoDocumento = ['' => 'Selecionar', '1' => 'DNI', '2' => 'Pasaporte', '3' => 'Carnet de Extranjeria'];

		return view('admin.usuario.create', compact('role', 'tipoDocumento'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		/*$user = User::create(['name' => 1,
			'email' => 1,
			'password' => 1,
			'dni' => 1,
			'slug' => 1]);*/

		//$user->assignRole('writer');

		return response()->json($request->all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user) {
		//
	}

	/*AJAX*/

	public function getListadoUsuario(request $request) {

		$user = User::all();

		$r = 0;
		return Datatables($user)
			->addColumn('n', function ($val) use (&$r) {
				return ++$r;
			})
			->addColumn('dni', function ($val) {
				return "0000000000";
			})
			->addColumn('nombre', function ($val) {
				return $val->name;
			})
			->addColumn('usuario', function ($val) {
				return $val->email;
			})
			->addColumn('role', function ($val) {
				return "Sin Rol";
			})
			->addColumn('status', function ($val) {
				if (1 == 1) {
					$this->btnStatus = "<span class='badge badge-success'>Activo</span>";
				} else {
					$this->btnStatus = "<span class='badge badge-danger'>Desactivado</span>";
				}

				return $this->btnStatus;
			})
			->addColumn('creado', function ($val) {
				return $val->created_at;
			})
			->addColumn('action', function ($val) {

				$this->btnEdit = "<a href='' data-id='" . $val->id . "' target='_blank' class='btn btn-info btnView'><i class='fa fa-pencil' aria-hidden='true' ></i></a>";

				$this->btnAsign = "<a href=''  data-id='" . $val->id . "' class='btn btn-warning btnPdf'><i class='fa fa-users' aria-hidden='true'></i></a>";

				return $this->btnEdit . $this->btnAsign;
			})
			->rawColumns(['status', 'action'])

			->make(true);

	}
}
