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

    /*
    *index
    *Este metodo permite mostrar todos los registros que estan dentro de la tabla buscada y realizar la busqueda en la misma
    *@return view
    */
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

    /*
    *create
    *Este metodo permite realizar la busqueda de las tablas necesarias para la creación
    */
    public function create(){
        $tipoobservaciones=DB::table('tipoobservaciones')->where('to_estado','=','1')->get();
    	return view("configuracion.observaciones.create",["tipoobservaciones"=>$tipoobservaciones]);
    }

    /*
    *store
    *Este metodo permite realizar el guardado
    *@return view
    */
    public function store(ObservacionesFormRequest $request){
    	$observacion = new Observaciones;
    	$observacion->ob_idTipoObservacionFK = $request->get('idTipoObservacion');
        $observacion->ob_descripcion= $request->get('descripcion');
    	$observacion->ob_estado= '1';
    	$observacion->save();
    	return Redirect::to('observaciones')->with('status', 'Observacion creada con éxito');
    }

    /*
    *show
    *Permite mostrar las busquedas realizadas dentro de la pagina
    *return view
    */
    public function show($id){
    	return view("configuracion.observaciones.show",["observaciones"=>Observaciones::findOrFail($id)]);
    }

    /*
    *edit
    *Permite realizar la busqueda en la base de datos para la edición
    *return view
    */
    public function edit($id){
        $observaciones=Observaciones::findOrFail($id);
        $tipoobservaciones=DB::table('tipoobservaciones')->where('to_estado','=','1')->get();
    	return view("configuracion.observaciones.edit",["observaciones"=>$observaciones,"tipoobservaciones"=>$tipoobservaciones]);
    }

    /*
    *update
    *Permite realizar la actualización del item seleccionado
    *return view
    */
    public function update(ObservacionesFormRequest $request,$id){
    	$observacion=Observaciones::findOrFail($id);
    	$observacion->ob_idTipoObservacionFK = $request->get('idTipoObservacion');
        $observacion->ob_descripcion= $request->get('descripcion');
    	$observacion->update();
    	return Redirect::to('observaciones')->with('status', 'Observacion actualizada con éxito');
    }

    /*
    *destroy
    *Permite cambiar el estado a 0 y desactivar el item de la tabla
    *return view
    */
    public function destroy($id){
    	$observacion=Observaciones::findOrFail($id);
    	$observacion->ob_estado='0';
    	$observacion->update();
    	return Redirect::to('observaciones')->with('status', 'Obserrvación inactivada con éxito');
    }
}
