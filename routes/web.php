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

Route::get('checkAppointment/{slug}', 'Webhook\CheckAppointmentController@handle')->name('checkAppointment');

//Route::post('webhook', 'WebhookController@handle');

//Route::post('confirmation', 'CrearCita\CrearCitaController@testeo')->name('confirmation');

Route::prefix('admin')->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');

	/*Respuesta Payu*/
	Route::get('response', 'CrearCita\CrearCitaController@response')->name('respuestaPaciente');

	Route::get('responseAsistentePayu', 'CrearCita\CrearCitaController@responseAsistentePayu')->name('respuestaAsistente');

	/*Respuesta Payu*/

	/*citas*/
	Route::group(['prefix' => 'usuario'], function () {
		/*AJAX*/

		Route::get('/crearcita/ajaxCrear/{id?}/{servicio?}', 'CrearCita\CrearCitaController@ajaxCrearCitaFecha')->name('admin.ajax.crearCita');

		Route::post('/crearcita/ajaxBuscar', 'CrearCita\CrearCitaController@ajaxBuscarHora')->name('admin.ajax.buscarCita');
		/*SELECLT SELECONAR*/
		Route::post('/crearcita/ajaxSelecionarBuscar', 'CrearCita\CrearCitaController@ajaxSelecionarBuscar')->name('admin.ajax.selecionarbuscar');

		Route::post('/crearcita/ajaxPayuFormulario', 'CrearCita\CrearCitaController@ajaxPayuFormulario')->name('admin.ajax.ajaxPayuFormulario');

		/*RUTA MATRIX*/
		Route::resource('crearcita', 'CrearCita\CrearCitaController');

		/*Pay*/

		Route::get('/citaprogramada/pago/{id}', 'CrearCita\CitaProgramadaController@pagoCitaprogramada')->name('admin.ajax.pagoCitaProgramada');

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
	Route::post('/import-excel', 'ProgramarCita\ProgramarCitaController@importUsers')->name('importUsers.index');
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

	Route::group(['prefix' => 'asistente'], function () {

		Route::get('crearCita', 'Administrador\UsuarioController@createAsistente')->name('asistenteCrearUsuario');

		Route::get('crearcita', 'CrearCita\CrearCitaController@crearmanual_index')->name('admin.crearManualCita');

		Route::post('storeCrearcita', 'CrearCita\CrearCitaController@storemanual_index')->name('admin.storeManualCita');

	});

	/*Log */
	Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

});

/*Entrada al Sistema*/
Route::get('/agenda', function () {
	return view('welcome');
})->name('agenda');

/*Rutas Login*/
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

/*RUTAS LCC*/

Route::get('/', function () {
	return view('frontend.liga.index');
});

Route::get('nosotros/quienesSomos', 'Liga\LccController@vista_quienes')->name('quienesSomos');
Route::get('nosotros/queHacemos', 'Liga\LccController@vista_queHacemos')->name('queHacemos');

Route::get('nosotros/centroDeteccion', 'Liga\LccController@vista_centroDetection')->name('centroDeteccion');

Route::get('nosotros/staffMedico', 'Liga\LccController@vista_staff')->name('staffMedico');
Route::get('servicios/especialidades', 'Liga\LccController@vista_especialidades')->name('especialidades');

Route::get('servicios/servicio', 'Liga\LccController@vista_servicio')->name('servicio');

Route::get('colectaPublica/formaDonacion', 'Liga\LccController@vista_formaDonacion')->name('donaciones');

Route::get('colectaPublica/campanaPublicitaria', 'Liga\LccController@vista_campanaPublicitaria')->name('campanaPublicitaria');

Route::get('colectaPublica/resultadoColecta', 'Liga\LccController@vista_resultadoColecta')->name('resultadoColecta');

Route::get('aliados/benefactor', 'Liga\LccController@vista_benefactor')->name('benefactor');

Route::get('aliados/marcas', 'Liga\LccController@vista_marcas')->name('marcas');

Route::get('campana/pancreas', 'Liga\LccController@vista_pancreas')->name('pancreas');

Route::get('campana/piel', 'Liga\LccController@vista_piel')->name('piel');

Route::get('campana/cuellouterino', 'Liga\LccController@vista_cuellouterino')->name('cuello');

Route::get('campana/mama', 'Liga\LccController@vista_mama')->name('mama');

Route::get('campana/varones', 'Liga\LccController@vista_amomibolas')->name('bolas');

Route::get('campana/vph', 'Liga\LccController@vista_vph')->name('vph');

Route::get('campana/diaContraElCancer', 'Liga\LccController@vista_diaContraElCancer')->name('diaContraElCancer');
