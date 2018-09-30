<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Input;

use GIDV\Http\Requests\EstudiantesFormRequest;

use GIDV\Estudiantes;

use DB;

class EstudiantesController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$estudiantes=DB::table('estudiantes as e')
    		->join('roles as r','e.es_idRolFK','=','r.ro_idRol')
    		->join('tipodocumento as t','e.es_idDocumentoFK','=','t.td_idDocumento')
    		->join('cursos as c','e.es_idCursoFK','=','c.cu_idCurso')
            ->join('grados as gr','e.es_idGradoFK','=','gr.gr_idGrado')
    		->select('e.es_idEstudiante','e.es_nombre','e.es_apellido','e.es_codigo','t.td_nombre as documento','e.es_numeroDocumento','e.es_jornada','r.ro_nombre as rol','gr.gr_nombre as grado','c.cu_nombre as curso','e.es_fotoEstudiante','e.es_estado','e.es_idCursoFK')
    		->where('e.es_nombre','LIKE','%'.$query.'%')
            ->orwhere('e.es_apellido','LIKE','%'.$query.'%')
    		->orderBy('e.es_idCursoFK','asc')
            ->orderBy('e.es_nombre','asc')
    		->paginate(8);
    		return view('configuracion.estudiantes.index',["estudiantes"=>$estudiantes,"searchText"=>$query]);
       	}
    }
    public function create(){
        $tipodocumentos=DB::table('tipodocumento')->where('td_estado','=','1')->get();
        $cursos=DB::table('cursos')->where('cu_estado','=','1')->get();
        $grados=DB::table('grados')->where('gr_estado','=','1')->get();
        return view("configuracion.estudiantes.create",["tipodocumentos"=>$tipodocumentos,"cursos"=>$cursos,"grados"=>$grados]);
    }
    public function store(EstudiantesFormRequest $request){
    	$estudiante = new Estudiantes;
    	$estudiante->es_nombre = $request->get('nombre');
        $estudiante->es_apellido = $request->get('apellido');
        $estudiante->es_codigo = $request->get('codigo');
        $estudiante->es_idDocumentoFK = '1';
        $estudiante->es_numeroDocumento = $request->get('numeroDocumento');
        $estudiante->es_jornada='Unica';
        $estudiante->es_idRolFK='4';
        $estudiante->es_idCursoFK = $request->get('idCurso');
        if($estudiante->es_idCursoFK==1){
        $estudiante->es_idGradoFK='1';
        }
        else if($estudiante->es_idCursoFK==2||$estudiante->es_idCursoFK==3||$estudiante->es_idCursoFK==4){
        $estudiante->es_idGradoFK='2';
        }
        else if($estudiante->es_idCursoFK==5||$estudiante->es_idCursoFK==6||$estudiante->es_idCursoFK==7){
        $estudiante->es_idGradoFK='3';
        }
        else{
        $estudiante->es_idGradoFK='4';
        }
        if(input::hasFile('fotoEstudiante')){
            $file=Input::file('fotoEstudiante');
            $file->move(public_path().'/imagenes/fotosEstudiantes/',$file->getClientOriginalName());
            $estudiante->es_fotoEstudiante=$file->getClientOriginalName();
        }
    	$estudiante->es_estado = '1';
    	$estudiante->save();
    	return Redirect::to('estudiantes')->with('status', 'Estudiante creado con éxito');
    }
    public function show($id){
    	return view("configuracion.estudiantes.show",["estudiantes"=>Estudiantes::findOrFail($id)]);
    }
    public function edit($id){
        $estudiantes=Estudiantes::findOrFail($id);
        $tipodocumentos=DB::table('tipodocumento')->where('td_estado','=','1')->get();
        $cursos=DB::table('cursos')->where('cu_estado','=','1')->get();
        $grados=DB::table('grados')->where('gr_estado','=','1')->get();
    	return view("configuracion.estudiantes.edit",["estudiantes"=>$estudiantes,"tipodocumentos"=>$tipodocumentos,"cursos"=>$cursos,"grados"=>$grados]);
    }
    public function update(EstudiantesFormRequest $request,$id){
    	$estudiante=Estudiantes::findOrFail($id);
    	$estudiante->es_nombre = $request->get('nombre');
        $estudiante->es_apellido = $request->get('apellido');
        $estudiante->es_codigo = $request->get('codigo');
        $estudiante->es_idDocumentoFK = '1';
        $estudiante->es_numeroDocumento = $request->get('numeroDocumento');
        $estudiante->es_jornada='Unica';
        $estudiante->es_idRolFK='4';
        $estudiante->es_idCursoFK = $request->get('idCurso');
        if($estudiante->es_idCursoFK==1){
        $estudiante->es_idGradoFK='1';
        }
        else if($estudiante->es_idCursoFK==2||$estudiante->es_idCursoFK==3||$estudiante->es_idCursoFK==4){
        $estudiante->es_idGradoFK='2';
        }
        else if($estudiante->es_idCursoFK==5||$estudiante->es_idCursoFK==6||$estudiante->es_idCursoFK==7){
        $estudiante->es_idGradoFK='3';
        }
        else{
        $estudiante->es_idGradoFK='4';
        }
        if(input::hasFile('fotoEstudiante')){
            $file=Input::file('fotoEstudiante');
            $file->move(public_path().'/imagenes/fotosEstudiantes/',$file->getClientOriginalName());
            $estudiante->es_fotoEstudiante=$file->getClientOriginalName();
        }
        $estudiante->es_estado = $request->get('estado');
    	$estudiante->update();
    	return Redirect::to('estudiantes')->with('status', 'Estudiante actualizado con éxito');
    }
    public function destroy($id){
    	$estudiante=Estudiantes::findOrFail($id);
    	$estudiante->es_estado='0';
    	$estudiante->update();
    	return Redirect::to('estudiantes');
    }
}
