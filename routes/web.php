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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('documentos', 'DocumentoController');

/*Route::get('/documentos', 'DocumentoController@index');
Route::get('/documentos/create', 'DocumentoController@create');
Route::post('/documentos', 'DocumentoController@store');
Route::get('/documentos/{documento}', 'DocumentoController@show');
Route::get('/documentos/{documento}/edit', 'DocumentoController@edit');
Route::put('/documentos/{documento}', 'DocumentoController@update');
Route::delete('/documentos/{documento}', 'DocumentoController@destroy');*/
