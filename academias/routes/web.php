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
    return view('auth.login');
});

Route::resource('academias', 'AcademiasController')->middleware('auth');
Route::resource('usuarios', 'UserController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('maestros')->group(function(){
    Route::get('/login', 'Auth\MaestrosLoginController@showLoginForm')->name('maestros.login');
    Route::post('/login', 'Auth\MaestrosLoginController@login')->name('maestros.login.submit');
});


Route::get('/maestrosHome', 'MaestrosController@index')->name('maestros.dashboard');




