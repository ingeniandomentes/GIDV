<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\CompetenciasFormRequest;

use GIDV\Competencias;

use DB;

class CompetenciasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$competencias=DB::table('competencias as c')
            ->join('procesos as p','c.co_idProcesoFK','=','p.pro_idProceso')
            ->select('c.co_idCompetencia','c.co_descripcion','p.pro_nombre as proceso','c.co_estado')
            ->where('c.co_descripcion','LIKE','%'.$query.'%')
    		->where ('c.co_estado','=','1')
    		->orderBy('c.co_idProcesoFK','asc')
    		->paginate(8);
    		return view('configuracion.competencias.index',["competencias"=>$competencias,"searchText"=>$query]);
       	}
    }
    public function create(){
        $procesos=DB::table('procesos')->where('pro_estado','=','1')
                                        ->orderBy('pro_nombre','asc')
        								->get();
    	return view("configuracion.competencias.create",["procesos"=>$procesos]);
    }
    public function store(CompetenciasFormRequest $request){
    	$competencia = new Competencias;
        $competencia->co_descripcion= $request->get('descripcion');
        $competencia->co_idProcesoFK= $request->get('proceso');
    	$competencia->co_estado = '1';
    	$competencia->save();
    	return Redirect::to('competencias')->with('status', 'Competencias creadas con éxito');
    }
    public function show($id){
    	return view("configuracion.competencias.show",["competencias"=>Competencias::findOrFail($id)]);
    }
    public function edit($id){
        $competencias=Competencias::findOrFail($id);
        $procesos=DB::table('procesos')->where('pro_estado','=','1')
                                        ->orderBy('pro_nombre','asc')
        								->get();
    	return view("configuracion.competencias.edit",["competencias"=>$competencias,"procesos"=>$procesos]);
    }
    public function update(CompetenciasFormRequest $request,$id){
    	$competencia=Competencias::findOrFail($id);
        $competencia->co_descripcion= $request->get('descripcion');
        $competencia->co_idProcesoFK= $request->get('proceso');
    	$competencia->update();
    	return Redirect::to('competencias')->with('status', 'Usuario actualizado con éxito');
    }
    public function destroy($id){
    	$competencia=Competencias::findOrFail($id);
    	$competencia->co_estado='0';
    	$competencia->update();
    	return Redirect::to('competencias')->with('status', 'Competencia inactivado con éxito');
    }
}
