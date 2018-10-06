<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\NotasFormRequest;

use GIDV\Notas;

use DB;

class NotasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$notas=DB::table('notas')->where('no_nombre','LIKE','%'.$query.'%')
    		-> where ('no_estado','=','1')
    		-> orderBy('no_idNota','asc')
    		-> paginate(8);
    		return view('configuracion.notas.index',["notas"=>$notas,"searchText"=>$query]);
       	}
    }
    public function create(){
    	return view("configuracion.notas.create");
    }
    public function store(NotasFormRequest $request){
    	$nota = new Notas;
    	$nota->no_nombre = $request->get('nombre');
    	$nota->no_descripcion = $request->get('descripcion');
    	$nota->no_estado = '1';
    	$nota->save();
    	return Redirect::to('notas')->with('status', 'Nota creada con éxito');
    }
    public function show($id){
    	return view("configuracion.notas.show",["notas"=>Notas::findOrFail($id)]);
    }
    public function edit($id){
    	return view("configuracion.notas.edit",["notas"=>Notas::findOrFail($id)]);
    }
    public function update(NotasFormRequest $request,$id){
    	$nota=Notas::findOrFail($id);
    	$nota->no_nombre=$request->get('nombre');
    	$nota->no_descripcion = $request->get('descripcion');
    	$nota->update();
    	return Redirect::to('notas')->with('status', 'Nota actualizada con éxito');
    }
    public function destroy($id){
    	$nota=Notas::findOrFail($id);
    	$nota->no_estado='0';
    	$nota->update();
    	return Redirect::to('notas')->with('status', 'Nota inactivada con éxito');
    }
}
