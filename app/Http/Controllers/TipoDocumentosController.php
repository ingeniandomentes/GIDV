<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\TipoDocumentosFormRequest;

use GIDV\TipoDocumentos;

use DB;

class TipoDocumentosController extends Controller
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
            $tipodocumentos=DB::table('tipodocumento')->where('td_nombre','LIKE','%'.$query.'%')
            -> where ('td_estado','=','1')
            -> orderBy('td_idDocumento','asc')
            -> paginate(8);
            return view('configuracion.tipodocumentos.index',["tipodocumentos"=>$tipodocumentos,"searchText"=>$query]);
        }
    }

    /*
    *create
    *Este metodo permite realizar la busqueda de las tablas necesarias para la creación
    */
    public function create(){
        return view("configuracion.tipodocumentos.create");
    }

    /*
    *store
    *Este metodo permite realizar el guardado
    *@return view
    */
    public function store(TipoDocumentosFormRequest $request){
        $tipodocumento = new TipoDocumentos;
        $tipodocumento->td_nombre = $request->get('nombre');
        $tipodocumento->td_estado = '1';
        $tipodocumento->save();
        return Redirect::to('tipodocumentos')->with('status', 'Tipo de Documento creado con éxito');
    }

    /*
    *show
    *Permite mostrar las busquedas realizadas dentro de la pagina
    *return view
    */
    public function show($id){
        return view("configuracion.tipodocumentos.show",["tipodocumentos"=>TipoDocumentos::findOrFail($id)]);
    }

    /*
    *edit
    *Permite realizar la busqueda en la base de datos para la edición
    *return view
    */
    public function edit($id){
        return view("configuracion.tipodocumentos.edit",["tipodocumentos"=>TipoDocumentos::findOrFail($id)]);
    }

    /*
    *update
    *Permite realizar la actualización del item seleccionado
    *return view
    */
    public function update(TipoDocumentosFormRequest $request,$id){
        $tipodocumento=TipoDocumentos::findOrFail($id);
        $tipodocumento->td_nombre=$request->get('nombre');
        $tipodocumento->update();
        return Redirect::to('tipodocumentos')->with('status', 'Tipo de Documento actualizado con éxito');
    }

    /*
    *destroy
    *Permite cambiar el estado a 0 y desactivar el item de la tabla
    *return view
    */
    public function destroy($id){
        $tipodocumento=TipoDocumentos::findOrFail($id);
        $tipodocumento->td_estado='0';
        $tipodocumento->update();
        return Redirect::to('tipodocumentos')->with('status', 'Tipo de Documento inactivado con éxito');
    }
}
