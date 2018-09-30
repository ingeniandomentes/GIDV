<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\GradosFormRequest;

use GIDV\Grados;

use GIDV\Cursos;

use DB;

class GradosController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$grados=DB::table('grados')->where('gr_nombre','LIKE','%'.$query.'%')
    		-> where ('gr_estado','=','1')
    		-> orderBy('gr_idGrado','asc')
    		-> paginate(8);
    		return view('configuracion.grados.index',["grados"=>$grados,"searchText"=>$query]);
       	}
    }
    public function create(){
    	return view("configuracion.grados.create");
    }
    public function store(GradosFormRequest $request){
    	$grado = new Grados;
    	$grado->gr_nombre = $request->get('nombre');
    	$grado->gr_estado = '1';
    	$grado->save();
    	return Redirect::to('grados')->with('status', 'Grado creado con éxito');
    }
    public function show($id){
    	return view("configuracion.grados.show",["grados"=>Grados::findOrFail($id)]);
    }
    public function edit($id){
    	return view("configuracion.grados.edit",["grados"=>Grados::findOrFail($id)]);
    }
    public function update(GradosFormRequest $request,$id){
    	$grado=Grados::findOrFail($id);
    	$grado->gr_nombre=$request->get('nombre');
    	$grado->update();
    	return Redirect::to('grados')->with('status', 'Grado actualizado con éxito');
    }
    public function destroy($id){
    	$grado=Grados::findOrFail($id);
    	$grado->gr_estado='0';
    	$grado->update();
    	return Redirect::to('grados');
    }

}
