<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traitsGeneral\principal;
use App\Http\Requests\RoleCreateRequest;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/*Limpiar variables.*/

class RoleController extends Controller {
	use principal;
	private $btnAsign;
	private $btnEdit;
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

		/*if ($role->hasPermissionTo($name)) {
				return 1;
			} else {
				return 2;
		*/

		//	return $val;

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
	public function store(RoleCreateRequest $request) {

		if ($request->ajax()) {

			$role = Role::create(['name' => $request->role,
			]);
			$role->givePermissionTo($request->permiso);

			if ($role->count() > 0) {
				$bandera = 1;

			} else {
				$bandera = 2;
			}

		}

		return response()->json(['data' => $bandera, 'permisos' => Permission::all()->pluck('name', 'id')]);
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

		$role = Role::find($id);
		/*Obtener los Permisos activos para el roles*/
		foreach (Permission::all() as $key => $value) {
			if ($role->hasPermissionTo($value->name)) {
				$t[] = $value->id;
			}
		}

		return view('admin.role.edit', ['permisos' => Permission::all()->pluck('name', 'id'), 'selecionar_permisos' => $t, 'role_name' => $role, 'id' => $id]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(RoleCreateRequest $request, $id) {
		if ($request->ajax()) {
			$select = '';
			$role = Role::find($id);

			$role->syncPermissions($request->permiso);

			/*Obtener los Permisos activos para el roles*/
			foreach (Permission::all() as $key => $value) {
				if ($role->hasPermissionTo($value->name)) {
					$t[] = $value->id;
				}
			}

			foreach (Permission::all() as $value) {
				if (in_array($value->id, $t)) {
					$select .= "<option value=" . $value->id . " selected>" . $value->name . "</option>";
				} else {
					$select .= "<option value=" . $value->id . " >" . $value->name . "</option>";
				}

			}

			return response()->json(['data' => 1, 'permisos' => Permission::all()->pluck('name', 'id'), 'selecionado' => $select]);

		}

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
	public function busqueda($id) {
		//self::unset_clean($tp);
		//self::unset_clean($role);
		$tp = '';
		$role = '';

		$role = Role::find($id);

		foreach (Permission::all() as $key => $value) {
			if ($role->hasPermissionTo($value->name)) {
				$tp .= "<span class='badge badge-secondary'>" . $value->name . "</span>";
			}
		}
		return $tp;

	}

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
				return self::busqueda($val->id);
			})
			->addColumn('creado', function ($val) {
				return $val->created_at;
			})
			->addColumn('action', function ($val) {
				$this->btnAsign = "<a href='#'  data-id='" . $val->id . "' class='btn btn-danger btnDel'><i class='fa fa-trash' aria-hidden='true'></i></a>";
				$this->btnEdit = "<a href='" . url('admin/role/' . $val->id . '/edit') . "'  data-id='" . $val->id . "' class='btn btn-primary'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";

				return $this->btnEdit . $this->btnAsign;
			})
			->rawColumns(['permiso', 'status', 'action'])

			->make(true);

	}
}
