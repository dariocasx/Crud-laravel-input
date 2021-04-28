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

Route::resource('clientes', 'ClienteController', ['except' => ['create']]); //vista del crud de cliente
Route::resource('grupos','GrupoController');//vista del crud de grupos

Route::get('table', 'ClienteController@getTable');//tabla de cliente
Route::get('table2', 'GrupoController@getTable');//tabla de grupo

Route::view('home', 'layout/home');//layout del home
Route::get('/', function () {
 	return view('layout.index');//vista del home 
});

Route::resource('customsearch', 'CustomSearchController');//controlador de las busquedas de cliente y grupo


