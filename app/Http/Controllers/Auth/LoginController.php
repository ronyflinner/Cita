<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Login Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles authenticating users for the application and
		    | redirecting them to your home screen. The controller uses a trait
		    | to conveniently provide its functionality to your applications.
		    |
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = 'admin/home';
	protected $redirectToUsuario = 'admin/usuario/citaprogramada';
	protected $redirectToAdmin = 'admin/programarcita';
	protected $redirectToPaciente = 'admin/verificarcita';
	protected $redirectToDesarrollador = 'admin/usuario';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest')->except('logout');
	}

	public function login(Request $request) {

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
			Session::flash('mensaje_info', 'Su incripción no se ha realizado ,recuerde que debe rellenar todos los campos');
			return view('auth.login');
		} else if ($captcha_success->success == true) {
			$this->validateLogin($request);

			// If the class is using the ThrottlesLogins trait, we can automatically throttle
			// the login attempts for this application. We'll key this by the username and
			// the IP address of the client making these requests into this application.
			if ($this->hasTooManyLoginAttempts($request)) {
				$this->fireLockoutEvent($request);

				return $this->sendLockoutResponse($request);
			}

			if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'status' => 1])) {
				/*Redireccionando Rol*/
				if (Auth::user()->hasRole(['Administrador'])) {
					return redirect($this->redirectToAdmin);
				} else if (Auth::user()->hasRole(['Paciente'])) {
					return redirect($this->redirectToUsuario);
				} else if (Auth::user()->hasRole(['Desarrollador'])) {
					return redirect($this->redirectToDesarrollador);

				} else {
					$this->incrementLoginAttempts($request);
					return $this->sendFailedLoginResponse($request);
				}
			}

		}
	}

	protected function validateLogin(Request $request) {
		$this->validate($request, [
			$this->username() => 'required|string',
			'password' => 'required|string',

		]);
	}
}
