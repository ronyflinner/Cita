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
Route::prefix('admin')->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');

	/*citas*/

	Route::group(['prefix' => 'usuario'], function () {

		/*AJAX*/
		Route::get('/crearcita/ajaxCrear/{id?}', 'CrearCita\CrearCitaController@ajaxCrearCitaFecha')->name('admin.ajax.crearCita');

		Route::post('/crearcita/ajaxBuscar', 'CrearCita\CrearCitaController@ajaxBuscarHora')->name('admin.ajax.buscarCita');

		/*RUTA MATRIX*/
		Route::resource('crearcita', 'CrearCita\CrearCitaController');

		/*Download y View pdf*/

		Route::get('/citaprogramada/showPdf/{id}/{condicion}', 'CrearCita\CitaProgramadaController@showpdf')->name('admin.ajax.showPdf');

		Route::get('getCitaProgramadaTable', 'CrearCita\CitaProgramadaController@getCitaProgramadaTable')->name('admin.ajax.CitaProgramdas');

		Route::get('cargard/{id?}', 'CrearCita\ContactoController@cargar')->name('cargard.index');

		Route::resource('contacto', 'CrearCita\ContactoController');

		Route::resource('cambiar', 'CrearCita\CambiarContraController');

		Route::resource('citaprogramada', 'CrearCita\CitaProgramadaController');
	});
	/*DATATABlE - usuario*/

	Route::post('StatusUsuario', 'Administrador\UsuarioController@getStatusPost')->name('admin.ajax.statusUsuario');

	Route::get('getUsuarioTable', 'Administrador\UsuarioController@getListadoUsuario')->name('admin.ajax.getUsuarioTable');

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
	Route::resource('servicioedit', 'ProgramarCita\ServicioEditController');

	Route::resource('programarcitaP', 'ProgramarCita\ProgramarC');

});

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();
