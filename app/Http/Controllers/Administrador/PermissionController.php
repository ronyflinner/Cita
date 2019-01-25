<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		return view('admin.permission.index');
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
		if ($request->ajax()) {

			$permiso = Permission::create(['name' => $request->data]);

			if ($permiso->count() > 0) {
				$bandera = 1;
			}

		}

		return response()->json(['data' => $bandera]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Permission  $permission
	 * @return \Illuminate\Http\Response
	 */
	public function show(Permission $permission) {

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Permission  $permission
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Permission $permission) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Permission  $permission
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Permission $permission) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Permission  $permission
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id) {
		if ($request->ajax()) {
			Permission::find($id)->delete();

			return response()->json(['data' => 1]);
		}

	}
	/*AJAX*/

	public function getListadoPermisos(request $request) {

		$user = Permission::all();

		$r = 0;
		return Datatables($user)
			->addColumn('n', function ($val) use (&$r) {
				return ++$r;
			})
			->addColumn('nombre', function ($val) {
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
