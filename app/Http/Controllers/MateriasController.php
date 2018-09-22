<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\MateriasFormRequest;

use GIDV\Materias;

use DB;

class MateriasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$materias=DB::table('materias as m')
            ->join('users as u','m.ma_docenteAsignadoFK','=','u.id')
            ->select('m.ma_idMateria','m.ma_nombre','m.ma_intensidad','u.name as docente1','u.us_apellido as docente2','m.ma_estado')
            ->where('m.ma_nombre','LIKE','%'.$query.'%')
    		->where ('m.ma_estado','=','1')
    		->orderBy('m.ma_idMateria','asc')
    		->paginate(8);
    		return view('configuracion.materias.index',["materias"=>$materias,"searchText"=>$query]);
       	}
    }
    public function create(){
        $docentes=DB::table('users')->where('us_estado','=','1')
        								->where('us_idRolFK','=','3')
                                        ->orderBy('name','asc')
        								->get();
    	return view("configuracion.materias.create",["docentes"=>$docentes]);
    }
    public function store(MateriasFormRequest $request){
    	$materia = new Materias;
    	$materia->ma_nombre = $request->get('nombre');
    	$materia->ma_intensidad = $request->get('intensidad');
        $materia->ma_docenteAsignadoFK= $request->get('idDocenteAsignado');
    	$materia->ma_estado = '1';
    	$materia->save();
    	return Redirect::to('materias');
    }
    public function show($id){
    	return view("configuracion.materias.show",["materias"=>Materias::findOrFail($id)]);
    }
    public function edit($id){
        $materias=Materias::findOrFail($id);
        $docentes=DB::table('users')->where('us_estado','=','1')
        								->where('us_idRolFK','=','3')
                                        ->orderBy('name','asc')
        								->get();
    	return view("configuracion.materias.edit",["materias"=>$materias,"docentes"=>$docentes]);
    }
    public function update(MateriasFormRequest $request,$id){
    	$materia=Materias::findOrFail($id);
    	$materia->ma_nombre = $request->get('nombre');
    	$materia->ma_intensidad = $request->get('intensidad');
        $materia->ma_docenteAsignadoFK= $request->get('idDocenteAsignado');
    	$materia->update();
    	return Redirect::to('materias');
    }
    public function destroy($id){
    	$materia=Materias::findOrFail($id);
    	$materia->ma_estado='0';
    	$materia->update();
    	return Redirect::to('materias');
    }
}
