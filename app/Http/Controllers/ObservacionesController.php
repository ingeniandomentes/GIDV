<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\ObservacionesFormRequest;

use GIDV\Observaciones;

use DB;

class ObservacionesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$observaciones=DB::table('observaciones as o')
            ->join('tipoobservaciones as to','o.ob_idTipoObservacionFK','=','to.to_idTipoObservacion')
            ->select('o.ob_idObservaciones','to.to_nombre as nombre','o.ob_descripcion','o.ob_estado')
            ->where('o.ob_descripcion','LIKE','%'.$query.'%')
    		-> orderBy('o.ob_idObservaciones','asc')
    		-> paginate(8);
    		return view('configuracion.observaciones.index',["observaciones"=>$observaciones,"searchText"=>$query]);
       	}
    }
    public function create(){
        $tipoobservaciones=DB::table('tipoobservaciones')->where('to_estado','=','1')->get();
    	return view("configuracion.observaciones.create",["tipoobservaciones"=>$tipoobservaciones]);
    }
    public function store(ObservacionesFormRequest $request){
    	$observacion = new Observaciones;
    	$observacion->ob_idTipoObservacionFK = $request->get('idTipoObservacion');
        $observacion->ob_descripcion= $request->get('descripcion');
    	$observacion->ob_estado= '1';
    	$observacion->save();
    	return Redirect::to('observaciones')->with('status', 'Observacion creada con éxito');
    }
    public function show($id){
    	return view("configuracion.observaciones.show",["observaciones"=>Observaciones::findOrFail($id)]);
    }
    public function edit($id){
        $observaciones=Observaciones::findOrFail($id);
        $tipoobservaciones=DB::table('tipoobservaciones')->where('to_estado','=','1')->get();
    	return view("configuracion.observaciones.edit",["observaciones"=>$observaciones,"tipoobservaciones"=>$tipoobservaciones]);
    }
    public function update(ObservacionesFormRequest $request,$id){
    	$observacion=Observaciones::findOrFail($id);
    	$observacion->ob_idTipoObservacionFK = $request->get('idTipoObservacion');
        $observacion->ob_descripcion= $request->get('descripcion');
    	$observacion->update();
    	return Redirect::to('observaciones')->with('status', 'Observacion actualizada con éxito');
    }
    public function destroy($id){
    	$observacion=Observaciones::findOrFail($id);
    	$observacion->ob_estado='0';
    	$observacion->update();
    	return Redirect::to('observaciones')->with('status', 'Obserrvación inactivada con éxito');
    }
}
