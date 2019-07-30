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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('auth.login');
});

/*Route::get('/academias/nuevo', function () {
    return view('academias.create');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/academias/nuevo', 'AcademiasController@create');
Route::get('/cursos/nuevo', 'CursosController@create');
