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

Route::get('/lista', 'HomeController@lista');
Route::get('/listar_usuarios', 'HomeController@listar');
Route::any('/eliminar_usuario/{id}', 'HomeController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


