<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\TipoObservacionesFormRequest;

use GIDV\TipoObservaciones;

use DB;

class TipoObservacionesController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $tipoobservaciones=DB::table('tipoobservaciones')->where('to_nombre','LIKE','%'.$query.'%')
            -> where ('to_estado','=','1')
            -> orderBy('to_idTipoObservacion','asc')
            -> paginate(8);
            return view('configuracion.tipoobservaciones.index',["tipoobservaciones"=>$tipoobservaciones,"searchText"=>$query]);
        }
    }
    public function create(){
        return view("configuracion.tipoobservaciones.create");
    }
    public function store(TipoObservacionesFormRequest $request){
        $tipoobservacion = new TipoObservaciones;
        $tipoobservacion->to_nombre = $request->get('nombre');
        $tipoobservacion->to_estado = '1';
        $tipoobservacion->save();
        return Redirect::to('tipoobservaciones')->with('status', 'Tipo de Observacion creado con éxito');
    }
    public function show($id){
        return view("configuracion.tipoobservaciones.show",["tipoobservaciones"=>TipoObservaciones::findOrFail($id)]);
    }
    public function edit($id){
        return view("configuracion.tipoobservaciones.edit",["tipoobservaciones"=>TipoObservaciones::findOrFail($id)]);
    }
    public function update(TipoObservacionesFormRequest $request,$id){
        $tipoobservacion=TipoObservaciones::findOrFail($id);
        $tipoobservacion->to_nombre=$request->get('nombre');
        $tipoobservacion->update();
        return Redirect::to('tipoobservaciones')->with('status', 'Tipo de Observacion actualizada con éxito');
    }
    public function destroy($id){
        $tipoobservacion=TipoObservaciones::findOrFail($id);
        $tipoobservacion->to_estado='0';
        $tipoobservacion->update();
        return Redirect::to('tipoobservaciones');
    }
}
