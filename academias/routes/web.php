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

// Inicio - raiz '/'
Route::get('/', function () {
    return view('auth.login');
});

// Recursos de las academias y admin/users
Route::resource('academias', 'AcademiasController')->middleware('auth');
Route::resource('usuarios', 'UserController')->middleware('auth');

Auth::routes();

// El dashboard del admin/user
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('maestros')->group(function(){
    Route::get('/login', 'Auth\MaestrosLoginController@showLoginForm')->name('maestros.login');
    Route::post('/login', 'Auth\MaestrosLoginController@login')->name('maestros.login.submit');
});

// El dashboard de los maestros
Route::get('/maestrosHome', 'HomeMaestrosController@index')->name('maestros.dashboard');

// Editar maestro pero en sesión de maestro
Route::get('/maestros/{id}/edit', 'MaestrosController@edit')
        ->middleware('auth:maestros');

// Crear un maestro en el dashboard del admin/user
Route::resource('maestros', 'MaestrosController');

// Cursos
Route::resource('cursos', 'CursosController');

// Alumnos
Route::get('/alumnos/addCurso/{id}', 'AlumnosController@addCursoEdit');
Route::match(array('PUT', 'PATCH'), "/alumnos/{id}/addCurso", array(
    'uses' => 'AlumnosController@addCurso'
));
Route::resource('alumnos', 'AlumnosController');


// Pagos
Route::get('/pagos/create/{id}/{total}', 'PagosController@create');
Route::match(array('PUT', 'PATCH'), "/pagos/{id}/realizarPago", array(
    'uses' => 'PagosController@realizarPago'
));
Route::resource('pagos', 'PagosController');


// Horarios
Route::resource('horarios', 'HorariosController');


// Maestro dashboard
Route::get('maestroDashboard/academias', function () {
    return view('maestroDashboard.academias');
})->middleware('auth:maestros'); // datos del maestro

Route::get('maestroDashboard/cursos', function () {
    return view('maestroDashboard.cursos');
})->middleware('auth:maestros'); // datos de cursos

Route::get('maestroDashboard/alumnos', function () {
    return view('maestroDashboard.alumnos');
})->middleware('auth:maestros'); // datos de alumnos


Route::get('/maestroDashboard/verCurso/{id}', 'calificaciones@show')->middleware('auth:maestros');
Route::get('/modificarCalificacion/{curso_id}/{alumno_id}', 'calificaciones@modificarCalificacion')->middleware('auth:maestros');

Route::match(array('PUT', 'PATCH'), "/nuevaCalificacion/{curso_id}/{alumno_id}", array(
    'uses' => 'calificaciones@nuevaCalificacion'
))->middleware('auth:maestros');