<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$role = Role::find(1);
		$user = User::find(2);

		$user->id;
		//$user->assignRole('Fuerza');

		$nola = $user->hasAllRoles(Role::all());
		/*if ($user->hasAllRoles('Fuerza')) {
				return 1;
			} else {
				return 2;
		*/

		$Role = Role::find(1);
		$val = Permission::find(2);
		$name = 'ver programar';

		if ($role->hasPermissionTo($name)) {
			return 1;
		} else {
			return 2;
		}

		return $val;

		return view('admin.role.index', ['permisos' => Permission::all()->pluck('name', 'id')]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return Role::all();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		if ($request->ajax()) {

			$role = Role::create(['name' => $request->data,
			]);
			$role->givePermissionTo($request->permiso);

			if ($role->count() > 0) {
				$bandera = 1;

			}

		}

		return response()->json(['data' => $bandera]);
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
	public function destroy(Request $request, $id) {
		if ($request->ajax()) {
			Role::find($id)->delete();

			return response()->json(['data' => 1]);
		}

	}
	/*AJAX*/

	public function getListadoRoles(request $request) {

		$user = Role::all();

		$r = 0;
		return Datatables($user)
			->addColumn('n', function ($val) use (&$r) {
				return ++$r;
			})
			->addColumn('nombre', function ($val) {
				return $val->name;
			})
			->addColumn('permiso', function ($val) {
				return $val->name;
			})

			->addColumn('creado', function ($val) {
				return $val->created_at;
			})
			->addColumn('action', function ($val) {

				$this->btnAsign = "<a href='#'  data-id='" . $val->id . "' class='btn btn-danger btnDel'><i class='fa fa-trash' aria-hidden='true'></i></a>";

				return $this->btnAsign;
			})
			->rawColumns(['status', 'action'])

			->make(true);

	}
}
