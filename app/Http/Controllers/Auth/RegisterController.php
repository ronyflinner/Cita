<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Register Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users as well as their
		    | validation and creation. By default this controller uses a trait to
		    | provide this functionality without requiring any additional code.
		    |
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/admin/usuario/crearcita';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed',
			'apellido_paterno' => 'required|string|max:255',
			'apellido_materno' => 'required|string|max:255',
			'numero' => 'required|min:8',
			'tipo' => 'required',
			'telefono' => 'required',

		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $data) {

		$user = User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'apellidoP' => $data['apellido_paterno'],
			'apellidoM' => $data['apellido_materno'],
			'dni' => $data['numero'],
			'tipo_documento' => $data['tipo'],
			'numero' => $data['telefono'],
			'slug' => str_random(150),
			'status' => 1,
			'tipo' => 2,
		]);
		$user->assignRole('Paciente');

		return $user;
	}

	public function showRegistrationForm() {
		$tipoDocumento = ['' => 'Selecionar', '1' => 'DNI', '2' => 'Pasaporte', '3' => 'Carnet de Extranjeria'];

		return view('auth.register', compact('tipoDocumento'));
	}

	public function register(Request $request) {
		$response = $_POST["g-recaptcha-response"];
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = array(
			'secret' => '6LcAbZkUAAAAAK1vFKltbEA90qjNF84AlShnHsLK',
			'response' => $_POST["g-recaptcha-response"],
		);
		$options = array(
			'http' => array(
				'method' => 'POST',
				'content' => http_build_query($data),
				'header' => 'Content-Type: application/x-www-form-urlencoded',
			),
		);
		$context = stream_context_create($options);
		$verify = file_get_contents($url, false, $context);
		$captcha_success = json_decode($verify);
		if ($captcha_success->success == false) {
			Session::flash('mensaje_info', 'Recuerda que debe rellenar todos los campos');
			return view('auth.login');
		} else if ($captcha_success->success == true) {

			$this->validator($request->all())->validate();

			event(new Registered($user = $this->create($request->all())));

			$this->guard()->login($user);

			return $this->registered($request, $user)
			?: redirect($this->redirectPath());

		}

	}
}
