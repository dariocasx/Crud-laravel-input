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

Route::resource('clientes', 'ClienteController', ['except' => ['create']]);

Route::get('table', 'ClienteController@getTable');
Route::get('table2', 'GrupoController@getTable');

Route::resource('grupos','GrupoController');

 Route::get('/', function () {
     return redirect()->route('clientes.index');
 	//return view('clientes.index');
 });

 Route::resource('customsearch', 'CustomSearchController');
 //Route::get('/clientes', 'ClienteController@index');
 Route::get('/clientes/action', 'ClienteController@action')->name('clientes.action');

//Route::redirect('/', '/clientes', 301);

//Auth::routes();
