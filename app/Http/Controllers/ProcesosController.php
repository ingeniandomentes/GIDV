<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\ProcesosFormRequest;

use GIDV\Procesos;

use DB;

class ProcesosController extends Controller
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
    		$procesos=DB::table('procesos as p')
            ->join('materias as m','p.pro_idMateriaFK','=','m.ma_idMateria')
            ->join('periodos as pe','p.pro_idPeriodoFK','=','pe.pe_idPeriodo')
            ->join('grados as g','p.pro_idGradoFK','=','g.gr_idGrado')
            ->select('p.pro_idProceso','p.pro_nombre','m.ma_nombre as materia','pe.pe_nombre as periodo','g.gr_nombre as grado','p.pro_estado')
            ->where('p.pro_nombre','LIKE','%'.$query.'%')
    		->where ('p.pro_estado','=','1')
    		->orderBy('p.pro_idPeriodoFK','asc')
            ->orderBy('p.pro_idGradoFK','asc')
    		->paginate(8);
    		return view('configuracion.procesos.index',["procesos"=>$procesos,"searchText"=>$query]);
       	}
    }

    /*
    *create
    *Este metodo permite realizar la busqueda de las tablas necesarias para la creación
    */
    public function create(){
        $materias=DB::table('materias')->where('ma_estado','=','1')
                                        ->orderBy('ma_nombre','asc')
        								->get();
        $periodos=DB::table('periodos') ->orderBy('pe_idPeriodo','asc')
        								->get();
        $grados=DB::table('grados')->where('gr_estado','=','1')
                                        ->orderBy('gr_idGrado','asc')
        								->get();
    	return view("configuracion.procesos.create",["materias"=>$materias,"periodos"=>$periodos,"grados"=>$grados]);
    }

    /*
    *store
    *Este metodo permite realizar el guardado
    *@return view
    */
    public function store(ProcesosFormRequest $request){
    	$proceso = new Procesos;
    	$proceso->pro_nombre = $request->get('nombre');
        $proceso->pro_idMateriaFK= $request->get('materia');
        $proceso->pro_idPeriodoFK= $request->get('periodo');
        $proceso->pro_idGradoFK= $request->get('grado');
    	$proceso->pro_estado = '1';
    	$proceso->save();
    	return Redirect::to('procesos')->with('status', 'Proceso creado con éxito');
    }

    /*
    *show
    *Permite mostrar las busquedas realizadas dentro de la pagina
    *return view
    */
    public function show($id){
    	return view("configuracion.procesos.show",["procesos"=>Procesos::findOrFail($id)]);
    }

    /*
    *edit
    *Permite realizar la busqueda en la base de datos para la edición
    *return view
    */
    public function edit($id){
        $procesos=Procesos::findOrFail($id);
        $materias=DB::table('materias')->where('ma_estado','=','1')
                                        ->orderBy('ma_nombre','asc')
        								->get();
        $periodos=DB::table('periodos')->where('pe_estado','=','1')
                                        ->orderBy('pe_idPeriodo','asc')
        								->get();
        $grados=DB::table('grados')->where('gr_estado','=','1')
                                        ->orderBy('gr_idGrado','asc')
        								->get();
    	return view("configuracion.procesos.edit",["procesos"=>$procesos,"materias"=>$materias,"periodos"=>$periodos,"grados"=>$grados]);
    }

    /*
    *update
    *Permite realizar la actualización del item seleccionado
    *return view
    */
    public function update(ProcesosFormRequest $request,$id){
    	$proceso=Procesos::findOrFail($id);
    	$proceso->pro_nombre = $request->get('nombre');
        $proceso->pro_idMateriaFK= $request->get('materia');
        $proceso->pro_idPeriodoFK= $request->get('periodo');
        $proceso->pro_idGradoFK= $request->get('grado');
    	$proceso->update();
    	return Redirect::to('procesos')->with('status', 'Proceso actualizado con éxito');
    }

    /*
    *destroy
    *Permite cambiar el estado a 0 y desactivar el item de la tabla
    *return view
    */
    public function destroy($id){
    	$proceso=Procesos::findOrFail($id);
    	$proceso->pro_estado='0';
    	$proceso->update();
    	return Redirect::to('procesos')->with('status', 'Proceso inactivado con éxito');
    }
}
