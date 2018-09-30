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
use GIDV\Cursos;

Route::get('/information/create/ajax-state',function()
{
    $idGrado = Input::get('grado_id');
    $cursos = Cursos::where('cu_idGradoFK','=',$idGrado)->get();
    return $cursos;
 
});

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('roles','RolesController');
Route::resource('calificaciones','CalificacionesController');
Route::resource('competencias','CompetenciasController');
Route::resource('cursos','CursosController');
Route::resource('estudiantes','EstudiantesController');
Route::resource('grados','GradosController');
Route::resource('materias','MateriasController');
Route::resource('notas','NotasController');
Route::resource('notasGenerales','NotasGeneralesController');
Route::resource('observaciones','ObservacionesController');
Route::resource('periodos','PeriodosController');
Route::resource('procesos','ProcesosController');
Route::resource('tipoDocumentos','TipoDocumentosController');
Route::resource('tipoObservaciones','TipoObservacionesController');
Route::resource('usuarios','UsuariosController');
Route::resource('notasgenerales','NotasGeneralesController');
Route::resource('observacionesgenerales','ObservacionesGeneralesController');

Route::get('configuracion/usuarios/reset','UsuariosController@reset');
Route::post('configuracion/usuarios/resetUpdate','UsuariosController@resetUpdate');

Route::group(['middleware'=>'estudiante'], function(){
	Route::get('estudiantes/create','EstudiantesController@create');
});

Route::group(['middleware'=>'directivo'], function(){
	Route::get('calificaciones/create','CalificacionesController@create');
});