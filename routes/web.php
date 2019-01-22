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

		Route::resource('contacto', 'CrearCita\ContactoController');

		Route::resource('cambiar', 'CrearCita\CambiarContraController');

		Route::resource('citaprogramada', 'CrearCita\CitaProgramadaController');
	});

	Route::resource('historialcita', 'CrearCita\HistorialCitaController');
	Route::resource('citaprogramada', 'CrearCita\CitaProgramadaController');
	Route::get('statusEdit/{id?}', 'ProgramarCita\ProgramarCitaController@statusEdit')->name('status.index');
	Route::get('buscarFecha/{id?}', 'ProgramarCita\ProgramarCitaController@buscarFecha')->name('buscarfecha.index');
	Route::get('editarDispon/{id?}', 'ProgramarCita\ProgramarCitaController@editarDispon')->name('editarDispon.index');
	Route::get('editarDispon2/{id?}', 'ProgramarCita\ProgramarCitaController@editarDispon2')->name('editarDispon2.index');

	Route::get('buscarCita/{id?}', 'ProgramarCita\HistorialCitaController@buscarCita')->name('buscarCita.index');
	Route::get('reprogramar/{id?}', 'ProgramarCita\HistorialCitaController@reprogramar')->name('reprogramar.index');

	Route::resource('programarcita', 'ProgramarCita\ProgramarCitaController');
	Route::resource('historialCitaP', 'ProgramarCita\HistorialCitaController');

	Route::resource('contraseñaP', 'ProgramarCita\ContraseñaController');

	Route::resource('programarcitaP', 'ProgramarCita\ProgramarC');

});

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();
