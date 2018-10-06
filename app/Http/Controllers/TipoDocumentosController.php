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
    public function create(){
        return view("configuracion.tipodocumentos.create");
    }
    public function store(TipoDocumentosFormRequest $request){
        $tipodocumento = new TipoDocumentos;
        $tipodocumento->td_nombre = $request->get('nombre');
        $tipodocumento->td_estado = '1';
        $tipodocumento->save();
        return Redirect::to('tipodocumentos')->with('status', 'Tipo de Documento creado con éxito');
    }
    public function show($id){
        return view("configuracion.tipodocumentos.show",["tipodocumentos"=>TipoDocumentos::findOrFail($id)]);
    }
    public function edit($id){
        return view("configuracion.tipodocumentos.edit",["tipodocumentos"=>TipoDocumentos::findOrFail($id)]);
    }
    public function update(TipoDocumentosFormRequest $request,$id){
        $tipodocumento=TipoDocumentos::findOrFail($id);
        $tipodocumento->td_nombre=$request->get('nombre');
        $tipodocumento->update();
        return Redirect::to('tipodocumentos')->with('status', 'Tipo de Documento actualizado con éxito');
    }
    public function destroy($id){
        $tipodocumento=TipoDocumentos::findOrFail($id);
        $tipodocumento->td_estado='0';
        $tipodocumento->update();
        return Redirect::to('tipodocumentos')->with('status', 'Tipo de Documento inactivado con éxito');
    }
}
