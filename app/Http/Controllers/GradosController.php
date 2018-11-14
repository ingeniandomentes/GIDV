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

    /*
    *index
    *Este metodo permite mostrar todos los registros que estan dentro de la tabla buscada y realizar la busqueda en la misma
    *@return view
    */
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

    /*
    *create
    *Este metodo permite realizar la busqueda de las tablas necesarias para la creación
    */
    public function create(){
    	return view("configuracion.grados.create");
    }

    /*
    *store
    *Este metodo permite realizar el guardado
    *@return view
    */
    public function store(GradosFormRequest $request){
    	$grado = new Grados;
    	$grado->gr_nombre = $request->get('nombre');
    	$grado->gr_estado = '1';
    	$grado->save();
    	return Redirect::to('grados')->with('status', 'Grado creado con éxito');
    }

    /*
    *show
    *Permite mostrar las busquedas realizadas dentro de la pagina
    *return view
    */
    public function show($id){
    	return view("configuracion.grados.show",["grados"=>Grados::findOrFail($id)]);
    }

    /*
    *edit
    *Permite realizar la busqueda en la base de datos para la edición
    *return view
    */
    public function edit($id){
    	return view("configuracion.grados.edit",["grados"=>Grados::findOrFail($id)]);
    }

    /*
    *update
    *Permite realizar la actualización del item seleccionado
    *return view
    */
    public function update(GradosFormRequest $request,$id){
    	$grado=Grados::findOrFail($id);
    	$grado->gr_nombre=$request->get('nombre');
    	$grado->update();
    	return Redirect::to('grados')->with('status', 'Grado actualizado con éxito');
    }

    /*
    *destroy
    *Permite cambiar el estado a 0 y desactivar el item de la tabla
    *return view
    */
    public function destroy($id){
    	$grado=Grados::findOrFail($id);
    	$grado->gr_estado='0';
    	$grado->update();
    	return Redirect::to('grados')->with('status', 'Grado inactivado con éxito');
    }

}
