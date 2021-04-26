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
Route::resource('layout','LayoutController');//vista del crud de grupos


Route::get('table', 'ClienteController@getTable');//tabla de cliente
Route::get('table2', 'GrupoController@getTable');//tabla de grupo



 Route::get('/', function () {
     //return redirect()->route('layout.index');
 	return view('layout.index');
 });

 Route::resource('customsearch', 'CustomSearchController');//controlador de las busquedas de cliente y grupo

 
 //Route::get('action', 'ClienteController@action')->name('clientes.action');

//Route::redirect('/', '/clientes', 301);

//Auth::routes();
