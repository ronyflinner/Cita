<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
	protected $redirectToUsuario = 'admin/usuario/crearcita';
	protected $redirectToAdmin = 'admin/programarcita';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest')->except('logout');
	}

	public function login(Request $request) {
		$this->validateLogin($request);

		// If the class is using the ThrottlesLogins trait, we can automatically throttle
		// the login attempts for this application. We'll key this by the username and
		// the IP address of the client making these requests into this application.
		if ($this->hasTooManyLoginAttempts($request)) {
			$this->fireLockoutEvent($request);

			return $this->sendLockoutResponse($request);
		}

		if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'status' => 1])) {

			if (Auth::user()->hasRole(['Administrador', 'Asistente'])) {
				return redirect($this->redirectToAdmin);
			} else {
				return redirect($this->redirectToUsuario);
			}
			//	return $this->redirectTo;
			return redirect($this->redirectTo);
		} else {
			$this->incrementLoginAttempts($request);
			return $this->sendFailedLoginResponse($request);
		}
	}

	protected function validateLogin(Request $request) {
		$this->validate($request, [
			$this->username() => 'required|string',
			'password' => 'required|string',
			'captcha' => 'required|captcha',
		]);
	}
}
