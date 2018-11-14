<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\PeriodosFormRequest;

use GIDV\Periodos;

use DB;

class PeriodosController extends Controller
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
    		$periodos=DB::table('periodos')->where('pe_nombre','LIKE','%'.$query.'%')
    		-> orderBy('pe_idPeriodo','asc')
            ->paginate(8);
    		return view('configuracion.periodos.index',["periodos"=>$periodos,"searchText"=>$query]);
       	}
    }

    /*
    *create
    *Este metodo permite realizar la busqueda de las tablas necesarias para la creación
    */
    public function create(){
    	return view("configuracion.periodos.create");
    }

    /*
    *store
    *Este metodo permite realizar el guardado
    *@return view
    */
    public function store(PeriodosFormRequest $request){
    	$periodo = new Periodos;
    	$periodo->pe_nombre = $request->get('nombre');
    	$periodo->pe_fechaInicial = $request->get('fechaInicial');
    	$periodo->pe_fechaFinal=$request->get('fechaFinal');
    	$periodo->pe_estado = '1';
    	$periodo->save();
    	return Redirect::to('periodos')->with('status', 'Periodo creado con éxito');
    }

    /*
    *show
    *Permite mostrar las busquedas realizadas dentro de la pagina
    *return view
    */
    public function show($id){
    	return view("configuracion.periodos.show",["periodos"=>Periodos::findOrFail($id)]);
    }

    /*
    *edit
    *Permite realizar la busqueda en la base de datos para la edición
    *return view
    */
    public function edit($id){
    	return view("configuracion.periodos.edit",["periodos"=>Periodos::findOrFail($id)]);
    }

    /*
    *update
    *Permite realizar la actualización del item seleccionado
    *return view
    */
    public function update(PeriodosFormRequest $request,$id){
    	$periodo=Periodos::findOrFail($id);
    	$periodo->pe_nombre = $request->get('nombre');
    	$periodo->pe_fechaInicial = $request->get('fechaInicial');
    	$periodo->pe_fechaFinal=$request->get('fechaFinal');
    	$periodo->pe_estado=$request->get('estado');
    	$periodo->update();
    	return Redirect::to('periodos')->with('status', 'Periodo actualizado con éxito');
    }

    /*
    *destroy
    *Permite cambiar el estado a 0 y desactivar el item de la tabla
    *return view
    */
    public function destroy($id){
    	$periodo=Periodos::findOrFail($id);
    	$periodo->pe_estado='0';
    	$periodo->update();
    	return Redirect::to('periodos')->with('status', 'Periodo inactivado con éxito');
    }
}
