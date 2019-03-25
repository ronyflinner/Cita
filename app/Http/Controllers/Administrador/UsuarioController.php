<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traitsGeneral\principal;
use App\Http\Requests\ReiniciarRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller {
	use principal;
	private $btnStatus;
	private $btnEdit;
	private $btnAsign;
	private $pathRedirecion = '';

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

	public function createAsistente() {
		$role = array_add(Role::all()->pluck('name', 'id'), "", "Selecionar");

		$tipoDocumento = ['' => 'Selecionar', '1' => 'DNI', '2' => 'Pasaporte', '3' => 'Carnet de Extranjeria'];

		return view('asistente.createAsistente', compact('role', 'tipoDocumento'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		if ($request->ajax()) {

			if ($request->verificar == 1) {
				$status = 1;
			} else {
				$status = 0;
			}

			try {
				$user = User::create([
					'name' => $request->nombre,
					'email' => $request->email,
					'password' => bcrypt($request->clave),
					'apellidoP' => $request->apellido_paterno,
					'apellidoM' => $request->apellido_materno,
					'dni' => $request->numero,
					'tipo_documento' => $request->tipo,
					'numero' => $request->telefono,
					'tipo' => $request->tipoUsuario,
					'slug' => str_random(150),
					'status' => $status]);

				$role = Role::find($request->role);
				$user->assignRole($role->name);
				return response()->json(['messages' => 1]);

			} catch (\Exception $e) {
				return response()->json(['messages' => 2]);

			}

		}

		//$user->assignRole('writer');

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
	public function edit($user) {
		$role = array_add(Role::all()->pluck('name', 'id'), "", "Selecionar");
		$idRole = '';
		$tipoDocumento = ['' => 'Selecionar', '1' => 'DNI', '2' => 'Pasaporte', '3' => 'Carnet de Extranjeria'];

		$user = User::where('slug', $user)->get();
		foreach (Role::all() as $value) {
			if ($user[0]->hasRole($value->name)) {
				$idRole = $value->id;
			}
		}

		return view('admin.usuario.edit', ['user' => $user, 'role' => $role, 'tipoDocumento' => $tipoDocumento, 'role_id' => $idRole]);
	}

	/**
	 * Update oranthe specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $user) {
		if ($request->ajax()) {
			//$dni = $request->tipo . '-' . $request->numero;
			$user = User::find($user);
			$user->name = $request->nombre;
			$user->email = $request->email;
			$user->apellidoP = $request->apellido_paterno;
			$user->apellidoM = $request->apellido_materno;
			$user->dni = $request->numero;
			$user->tipo_documento = $request->tipo;
			$user->numero = $request->telefono;

			$user->tipo = $request->tipoUsuario;

			if ($request->activo == 1) {
				$user->password = bcrypt($request->clave);

			}
			$positivo = $user->save();

			$role = Role::find($request->role);
			$user->syncRoles($role->name);
			return response()->json($positivo);
		}
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

	public function getStatusPost(request $request) {

		if ($request->ajax()) {
			$user = User::find($request->data);

			if ($user->status == 1) {
				$user->status = 0;
			} else {
				$user->status = 1;
			}
			$user->save();

			return response()->json(['data' => 1, 'value' => $user]);
		}

	}

	public function resetPassword(ReiniciarRequest $request) {

		$user = User::where('id', Auth::id())
			->update(['password' => bcrypt($request->password)]);

		if ($user) {
			$mensaje = 1;

		} else {
			$mensaje = 2;
		}
		return response()->json(['mensaje' => $mensaje]);

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
				//1-Dni  2-Pasaporte 3-Carnet Extranjeria

				//$documento = explode('-', $val->dni);
				if ($val->tipo_documento == 1) {
					$acronimo = 'D';
				} else if ($val->tipo_documento == 2) {
					$acronimo = 'P';
				} else {
					$acronimo = 'C';
				}
				return $acronimo . '-' . $val->dni;

			})
			->addColumn('nombre', function ($val) {
				return $val->name;
			})
			->addColumn('usuario', function ($val) {
				return $val->email;
			})
			->addColumn('role', function ($val) {
				return $val->getRoleNames();
			})
			->addColumn('status', function ($val) {
				if ($val->status == 1) {
					$this->btnStatus = " <span class='badge badge-success'>Activo</span>";
				} else {
					$this->btnStatus = "<span class='badge badge-danger'>Desactivado</span>";
				}

				return $this->btnStatus;
			})
			->addColumn('creado', function ($val) {
				return $val->created_at;
			})
			->addColumn('action', function ($val) {
				$path = route('usuario.edit', [$val->slug]);

				$this->btnEdit = "<a href='" . $path . "' data-id='" . $val->id . "' target='_blank' class='btn btn-info btnView'><i class='fa fa-pencil' aria-hidden='true' ></i></a>";

				$this->btnAsign = "<a href='#'  data-id='" . $val->id . "' class='btn btn-danger btnStatus'><i class=' fa fa-refresh' aria-hidden='true'></i></a>";

				return $this->btnEdit . $this->btnAsign;
			})
			->rawColumns(['status', 'action'])

			->make(true);

	}
}
