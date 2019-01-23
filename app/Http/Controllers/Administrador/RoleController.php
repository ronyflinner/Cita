<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.role.index');
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
	/*AJAX*/

	public function getListadoRoles(request $request) {

		$user = Role::all();

		$r = 0;
		return Datatables($user)
			->addColumn('n', function ($val) use (&$r) {
				return ++$r;
			})
			->addColumn('nombre', function ($val) {
				return "0000000000";
			})
			->addColumn('guardanombre', function ($val) {
				return $val->name;
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
