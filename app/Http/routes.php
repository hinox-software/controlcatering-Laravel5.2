<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('user', 'UserController');

Route::resource('importar', 'ImportarController', ['names' => [
    'create' => 'importar.create'
]]);
Route::resource('trabajos', 'TrabajosController');

Route::get('importardatos/historial', 
	array('as' => 'importar.historial', 'uses' => 'ImportarController@historial'));
Route::resource('importar', 'ImportarController');


Route::get('reportes/cerrados', 
	array('as' => 'trabajos.repcerrados', 'uses' => 'TrabajosController@repcerrados'));

Route::post('reportes/generadoscerrados', 
	array('as' => 'trabajos.generadocerrados', 'uses' => 'TrabajosController@generadoscerrados'));

Route::get('reporteestadoot/{tipo}/{dpto}', 
	array('as' => 'reporte.r_estadoot', 'uses' => 'PdfController@estadoot'));

Route::get('trabajos/{tipotrabajo}/{area}', 
	array('as' => 'trabajos.mostrartrabajos', 'uses' => 'TrabajosController@mostrartrabajos'));
Route::get('trabajos/{tipotrabajo}/{area}/{id}/adicionartrabajo', 
	array('as' => 'trabajos.adicionartrabajo', 'uses' => 'TrabajosController@adicionartrabajo'));
Route::get('trabajos/{tipotrabajo}/{area}/{id}/historialtrabajo', 
	array('as' => 'trabajos.historialtrabajo', 'uses' => 'TrabajosController@historialtrabajo'));


Route::get('api/motivos/{idestado}/{idarea}', 
	array('as' => 'api.motivos', 'uses' => 'ApiController@getmotivos'));

Route::post('api/setdpto', 
	array('as' => 'api.setdpto', 'uses' => 'ApiController@setdptoseleccionado'));

Route::put('trabajos/{id}/{tipotrabajo}/{area}', 
	array('as' => 'trabajos.updatetrabajos', 'uses' => 'TrabajosController@updatetrabajos'));

Route::resource('tecnicos', 'TecnicosController');

Route::get('reportehistorial/{tipotrabajo}/{area}/{id}', array('as' => 'reportehistorial', 'uses' => 'PdfController@historialtrabajos'));

Route::get('cerrarjornada', 
	array('as' => 'trabajos.cerrarjornada', 'uses' => 'TrabajosController@cerrarjornada'));

Route::post('ejecutacerrarjornada', 
	array('as' => 'trabajos.ejecutacerrarjornada', 'uses' => 'TrabajosController@ejecutacerrarjornada'));

Route::get('misestadisticas', 
	array('as' => 'graficos.misestadisticas', 'uses' => 'TrabajosController@misestadisticas'));
Route::get('misestadisticascentralizacion', 
	array('as' => 'graficos.misestadisticascentralizacion', 'uses' => 'TrabajosController@misgraficoscentralizacion'));
Route::get('misestadisticasdigitacion', 
	array('as' => 'graficos.misestadisticasdigitacion', 'uses' => 'TrabajosController@misgraficosdigitacion'));
Route::get('producciongeneralgrafico', 
	array('as' => 'graficos.producciongeneralgrafico', 'uses' => 'TrabajosController@producciongeneralgrafico'));
Route::resource('zonas', 'ZonasController');