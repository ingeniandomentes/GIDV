<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\CursosFormRequest;

use GIDV\Cursos;

use DB;

class CursosController extends Controller
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
    		$cursos=DB::table('cursos as c')
            ->join('grados as g','c.cu_idGradoFK','=','g.gr_idGrado')
            ->select('c.cu_idCurso','c.cu_nombre','g.gr_nombre as grado','c.cu_estado')
            ->where('c.cu_nombre','LIKE','%'.$query.'%')
    		-> where ('c.cu_estado','=','1')
    		-> orderBy('c.cu_idCurso','asc')
    		-> paginate(8);
    		return view('configuracion.cursos.index',["cursos"=>$cursos,"searchText"=>$query]);
       	}
    }

    /*
    *create
    *Este metodo permite realizar la busqueda de las tablas necesarias para la creación
    */
    public function create(){
        $grados=DB::table('grados')->where('gr_estado','=','1')->get();
    	return view("configuracion.cursos.create",["grados"=>$grados]);
    }

    /*
    *store
    *Este metodo permite realizar el guardado
    *@return view
    */
    public function store(CursosFormRequest $request){
    	$curso = new Cursos;
    	$curso->cu_nombre = $request->get('nombre');
        $curso->cu_idGradoFK= $request->get('idGrado');
    	$curso->cu_estado = '1';
    	$curso->save();
    	return Redirect::to('cursos')->with('status', 'Curso creado con éxito');
    }

    /*
    *show
    *Permite mostrar las busquedas realizadas dentro de la pagina
    *return view
    */
    public function show($id){
    	return view("configuracion.cursos.show",["cursos"=>Cursos::findOrFail($id)]);
    }

    /*
    *edit
    *Permite realizar la busqueda en la base de datos para la edición
    *return view
    */
    public function edit($id){
        $cursos=Cursos::findOrFail($id);
        $grados=DB::table('grados')->where('gr_estado','=','1')->get();
    	return view("configuracion.cursos.edit",["cursos"=>$cursos,"grados"=>$grados]);
    }

    /*
    *update
    *Permite realizar la actualización del item seleccionado
    *return view
    */
    public function update(CursosFormRequest $request,$id){
    	$curso=Cursos::findOrFail($id);
    	$curso->cu_nombre = $request->get('nombre');
        $curso->cu_idGradoFK= $request->get('idGrado');
    	$curso->update();
    	return Redirect::to('cursos')->with('status', 'Curso actualizado con éxito');
    }

    /*
    *destroy
    *Permite cambiar el estado a 0 y desactivar el item de la tabla
    *return view
    */
    public function destroy($id){
    	$curso=Cursos::findOrFail($id);
    	$curso->cu_estado='0';
    	$curso->update();
    	return Redirect::to('cursos')->with('status', 'Curso inactivado con éxito');
    }
}
