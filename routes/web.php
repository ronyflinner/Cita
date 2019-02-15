<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
/*Webhood*/

Route::post('webhook', 'WebhookController@handle');
Route::post('confirmation', 'CrearCita\CrearCitaController@testeo')->name('confirmation');

Route::prefix('admin')->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');

	/*citas*/

	Route::group(['prefix' => 'usuario'], function () {

		/*AJAX*/

		Route::get('response', 'CrearCita\CrearCitaController@response')->name('roteo');

		Route::get('/crearcita/ajaxCrear/{id?}/{servicio?}', 'CrearCita\CrearCitaController@ajaxCrearCitaFecha')->name('admin.ajax.crearCita');

		Route::post('/crearcita/ajaxBuscar', 'CrearCita\CrearCitaController@ajaxBuscarHora')->name('admin.ajax.buscarCita');

		Route::post('/crearcita/ajaxSelecionarBuscar', 'CrearCita\CrearCitaController@ajaxSelecionarBuscar')->name('admin.ajax.selecionarbuscar');

		Route::post('/crearcita/ajaxPayuFormulario', 'CrearCita\CrearCitaController@ajaxPayuFormulario')->name('admin.ajax.ajaxPayuFormulario');

		/*RUTA MATRIX*/
		Route::resource('crearcita', 'CrearCita\CrearCitaController');

		/*Download y View pdf*/

		Route::get('/citaprogramada/showPdf/{id}/{condicion}', 'CrearCita\CitaProgramadaController@showpdf')->name('admin.ajax.showPdf');

		Route::get('getCitaProgramadaTable', 'CrearCita\CitaProgramadaController@getCitaProgramadaTable')->name('admin.ajax.CitaProgramdas');

		Route::get('cargard/{id?}', 'CrearCita\ContactoController@cargar')->name('cargard.index');

		Route::get('list_mensaje', 'CrearCita\MensajeController@list_mensaje')->name('listamen.index');
		Route::resource('listameonsaje', 'CrearCita\MensajeController');
		Route::resource('contacto', 'CrearCita\ContactoController');

		Route::resource('cambiar', 'CrearCita\CambiarContraController');

		Route::resource('citaprogramada', 'CrearCita\CitaProgramadaController');

	});

	/*Culqui*/
	Route::post('cargo', 'Pagos\CulquiController@cargo')->name('cargo.cliente');
	Route::post('orden', 'Pagos\CulquiController@orden')->name('orden.cliente');

	/*DATATABlE - usuario*/

	Route::post('StatusUsuario', 'Administrador\UsuarioController@getStatusPost')->name('admin.ajax.statusUsuario');

	Route::get('getUsuarioTable', 'Administrador\UsuarioController@getListadoUsuario')->name('admin.ajax.getUsuarioTable');

	Route::post('reiniciarClave', 'Administrador\UsuarioController@resetPassword')->name('admin.reiniciarClave');

	Route::resource('usuario', 'Administrador\UsuarioController');
	/*DATATABlE - usuario*/

	/*Datatable - Role */
	Route::get('getRoleTable', 'Administrador\RoleController@getListadoRoles')->name('admin.ajax.getRoleTable');

	Route::resource('role', 'Administrador\RoleController');
	/*Datatable - Role */

	/*Datatable - Permiso */
	Route::get('getPermisoTable', 'Administrador\PermissionController@getListadoPermisos')->name('admin.ajax.getPermisoTable');

	Route::resource('permiso', 'Administrador\PermissionController');
	/*Datatable - Permiso*/

	Route::get('buscarVeri/{id?}', 'Asistencia\VerificadorController@buscar')->name('buscarveri.index');
	Route::get('asistenciab/{id?}', 'Asistencia\VerificadorController@asistencia')->name('asistenciab.index');

	Route::resource('verificarcita', 'Asistencia\VerificadorController');
	Route::resource('crearcitaA', 'Asistencia\CrearCitaAController');

	Route::resource('historialcita', 'CrearCita\HistorialCitaController');

	Route::get('statusEdit/{id?}', 'ProgramarCita\ProgramarCitaController@statusEdit')->name('status.index');
	Route::get('buscarFecha/{id?}', 'ProgramarCita\ProgramarCitaController@buscarFecha')->name('buscarfecha.index');
	Route::get('editarDispon/{id?}', 'ProgramarCita\ProgramarCitaController@editarDispon')->name('editarDispon.index');
	Route::get('editarDispon2/{id?}', 'ProgramarCita\ProgramarCitaController@editarDispon2')->name('editarDispon2.index');

	Route::get('bdoctor/{id?}', 'ProgramarCita\ProgramarCitaController@bdoctor')->name('bdoctor.index');
	Route::get('buscarCita/{id?}', 'ProgramarCita\HistorialCitaController@buscarCita')->name('buscarCita.index');
	Route::get('reprogramar/{id?}', 'ProgramarCita\HistorialCitaController@reprogramar')->name('reprogramar.index');
	Route::get('descargarPDF', 'ProgramarCita\HistorialCitaController@showpdf')->name('descargarPDF.index');

	Route::resource('programarcita', 'ProgramarCita\ProgramarCitaController');
	Route::resource('historialCitaP', 'ProgramarCita\HistorialCitaController');

	Route::get('editardoc', 'ProgramarCita\DoctorEditController@editardoc')->name('editardoc.index');

	Route::get('buscarservicio/{id?}', 'ProgramarCita\DoctorEditController@buscarservicio')->name('buscarservicio.index');

	Route::resource('doctoredit', 'ProgramarCita\DoctorEditController');
	Route::resource('contraseñaP', 'ProgramarCita\ContraseñaController');

	Route::get('editarServicio', 'ProgramarCita\ServicioEditController@editarServicio')->name('editarServicio.index');
	Route::get('editarServicio2', 'ProgramarCita\ServicioEditController@editarServicio2')->name('editarServicio2.index');
	Route::get('mostrarServicio', 'ProgramarCita\ServicioEditController@mostrarServicio')->name('mostrarServicio.index');

	Route::resource('servicioedit', 'ProgramarCita\ServicioEditController');

	Route::resource('programarcitaP', 'ProgramarCita\ProgramarC');

});

Route::get('/', function () {
	return view('welcome');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Auth::routes();
