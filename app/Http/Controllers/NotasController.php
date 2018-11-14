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

    /*
    *index
    *Este metodo permite mostrar todos los registros que estan dentro de la tabla buscada y realizar la busqueda en la misma
    *@return view
    */
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

    /*
    *create
    *Este metodo permite realizar la busqueda de las tablas necesarias para la creación
    */
    public function create(){
    	return view("configuracion.notas.create");
    }

    /*
    *store
    *Este metodo permite realizar el guardado
    *@return view
    */
    public function store(NotasFormRequest $request){
    	$nota = new Notas;
    	$nota->no_nombre = $request->get('nombre');
    	$nota->no_descripcion = $request->get('descripcion');
    	$nota->no_estado = '1';
    	$nota->save();
    	return Redirect::to('notas')->with('status', 'Nota creada con éxito');
    }

    /*
    *show
    *Permite mostrar las busquedas realizadas dentro de la pagina
    *return view
    */
    public function show($id){
    	return view("configuracion.notas.show",["notas"=>Notas::findOrFail($id)]);
    }

    /*
    *edit
    *Permite realizar la busqueda en la base de datos para la edición
    *return view
    */
    public function edit($id){
    	return view("configuracion.notas.edit",["notas"=>Notas::findOrFail($id)]);
    }

    /*
    *update
    *Permite realizar la actualización del item seleccionado
    *return view
    */
    public function update(NotasFormRequest $request,$id){
    	$nota=Notas::findOrFail($id);
    	$nota->no_nombre=$request->get('nombre');
    	$nota->no_descripcion = $request->get('descripcion');
    	$nota->update();
    	return Redirect::to('notas')->with('status', 'Nota actualizada con éxito');
    }

    /*
    *destroy
    *Permite cambiar el estado a 0 y desactivar el item de la tabla
    *return view
    */
    public function destroy($id){
    	$nota=Notas::findOrFail($id);
    	$nota->no_estado='0';
    	$nota->update();
    	return Redirect::to('notas')->with('status', 'Nota inactivada con éxito');
    }
}
