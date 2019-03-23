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

/*
* En esta ruta se valida el inicio de sesión de los usuarios
*/
Route::get('/', function () {
    return view('auth/login');
});

//Cursos
/*
*Esta ruta permite la generación de los boletines por cursos
*/
Route::post('/boletines/cursosPDF','BoletinesController@cursosPDF');

Route::post('/boletines/cursosQPDF','BoletinesController@cursosQPDF');

//Estudiantes

//Cursos
/*
*Esta ruta permite la generación de los boletines por cursos
*/

Route::post('/boletines/estudiantesPDF','BoletinesController@estudiantesPDF');

Route::post('/boletines/estudiantesQPDF','BoletinesController@estudiantesQPDF');

Auth::routes();

/*
*Esta ruta permite redirigir al home
*/

Route::get('/home', 'HomeController@index')->name('home');

/*
*Esta lista de routes resource permite que todos los metodos crud se ejecutan sin necesidad de escribirlos uno a uno 
*/

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
Route::resource('tipodocumentos','TipoDocumentosController');
Route::resource('tipoobservaciones','TipoObservacionesController');
Route::resource('usuarios','UsuariosController');
Route::resource('notasgenerales','NotasGeneralesController');
Route::resource('observacionesgenerales','ObservacionesGeneralesController');
Route::resource('boletines','BoletinesController');


/*
* Esta ruta permite el reinicio de contraseña
*/
Route::get('/usuarios/reset/{user}',[
			'as'=>'configuracion/usuarios/reset',
			'uses'=>'UsuariosController@reset']);

Route::post('/usuarios/resetUpdate/{id}','UsuariosController@resetUpdate');