<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function () {
    return redirect('/login');
});

//REDIRECCIONA AL FORMULARIO DE CONSULTA DESDE UN INICIO

// Route::get('/', function () {
//     return redirect('form_consulta');
// });

Route::get('form_consulta', 'ConsultasController@form_consulta');
Route::get('consultaMesaAsignada/{recinto}', 'ConsultasController@consultaMesaAsignada');

Route::get('form_pruebas', 'PruebasController@form_pruebas');


Auth::routes();

Route::group(["middleware" => "apikey.validate"], function () {

    //Rutas
    // Route::get("cursos", "Api\CursoController@getCursos");
    Route::get('indexAPI', 'ServiciosController@indexAPI');
    Route::get('getResultados', 'ServiciosController@getResultados');

    //Graficas JSON
    // Route::get('presidenciales', 'GraficosController@presidenciales');

  });

Route::group(['middleware' => 'cors'], function () {
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/listado_personas', function (){
        return view('listado.listado_personas');
    })->name('admin.listado_personas'); // <--- este es el nombre que busca el controlador.
    
    Route::get('/home', 'HomeController@index');

});
