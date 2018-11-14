<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\UsuariosFormRequest;

use GIDV\User;

use DB;

use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
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
    		$usuarios=DB::table('users as u')
    		->join('roles as r','u.us_idRolFK','=','r.ro_idRol')
    		->join('tipodocumento as t','u.us_idDocumentoFK','=','t.td_idDocumento')
    		->join('cursos as c','u.us_idCursoFK','=','c.cu_idCurso')
            ->join('grados as gr','u.us_idGradoFK','=','gr.gr_idGrado')
    		->select('u.id','u.email','u.password','u.name','u.us_apellido','t.td_nombre as documento','u.us_numeroDocumento','r.ro_nombre as rol','c.cu_nombre as curso','gr.gr_nombre as grado','u.us_estado','u.us_idRolFK')
    		->where('u.name','LIKE','%'.$query.'%')
            ->orwhere('u.us_apellido','LIKE','%'.$query.'%')
    		->orderBy('u.us_idRolFK','asc')
            ->orderBy('u.name','asc')
    		->paginate(8);
    		return view('configuracion.usuarios.index',["usuarios"=>$usuarios,"searchText"=>$query]);
       	}
    }

    /*
    *create
    *Este metodo permite realizar la busqueda de las tablas necesarias para la creación
    */
    public function create(){
        $tipodocumentos=DB::table('tipodocumento')->where('td_estado','=','1')->get();
        $cursos=DB::table('cursos')->where('cu_estado','=','1')->get();
        $roles=DB::table('roles')->where('ro_estado','=','1')->get();
        return view("configuracion.usuarios.create",["tipodocumentos"=>$tipodocumentos,"cursos"=>$cursos,"roles"=>$roles]);
    }

    /*
    *store
    *Este metodo permite realizar el guardado
    *@return view
    */
    public function store(UsuariosFormRequest $request){
    	$usuario = new User;
    	$usuario->email = $request->get('email');
    	$usuario->password = bcrypt($request->get('password'));
    	$usuario->name = $request->get('name');
        $usuario->us_apellido = $request->get('us_apellido');
        $usuario->us_idDocumentoFK = $request->get('us_idDocumentoFK');
        $usuario->us_numeroDocumento = $request->get('us_numeroDocumento');
        $usuario->us_idRolFK=$request->get('us_idRolFK');
        $usuario->us_idCursoFK = $request->get('us_idCursoFK');
        if($usuario->us_idCursoFK==1){
        $usuario->us_idGradoFK='1';
        }
        else if($usuario->us_idCursoFK==2||$usuario->us_idCursoFK==3||$usuario->us_idCursoFK==4){
        $usuario->us_idGradoFK='2';
        }
        else if($usuario->us_idCursoFK==5||$usuario->us_idCursoFK==6||$usuario->us_idCursoFK==7){
        $usuario->us_idGradoFK='3';
        }
        else if($usuario->us_idCursoFK==8||$usuario->us_idCursoFK==9){
        $usuario->us_idGradoFK='4';
        }
        else{
        $usuario->us_idGradoFK='5';
        }
    	$usuario->us_estado = '1';
    	$usuario->save();
    	return Redirect::to('usuarios')->with('status', 'Usuario creado con éxito');
    }

    /*
    *show
    *Permite mostrar las busquedas realizadas dentro de la pagina
    *return view
    */
    public function show($id){
    	return view("configuracion.usuarios.show",["usuarios"=>User::findOrFail($id)]);
    }

    /*
    *edit
    *Permite realizar la busqueda en la base de datos para la edición
    *return view
    */
    public function edit($id){
        $usuarios=User::findOrFail($id);
        $tipodocumentos=DB::table('tipodocumento')->where('td_estado','=','1')->get();
        $cursos=DB::table('cursos')->where('cu_estado','=','1')->get();
        $roles=DB::table('roles')->where('ro_estado','=','1')->get();
    	return view("configuracion.usuarios.edit",["usuarios"=>$usuarios,"tipodocumentos"=>$tipodocumentos,"cursos"=>$cursos,"roles"=>$roles]);
    }

    /*
    *update
    *Permite realizar la actualización del item seleccionado
    *return view
    */
    public function update(UsuariosFormRequest $request,$id){
    	$usuario=User::findOrFail($id);
    	$usuario->email = $request->get('email');
        $usuario->password = bcrypt($request->get('password'));
        $usuario->name = $request->get('name');
        $usuario->us_apellido = $request->get('us_apellido');
        $usuario->us_idDocumentoFK = $request->get('us_idDocumentoFK');
        $usuario->us_numeroDocumento = $request->get('us_numeroDocumento');
        $usuario->us_idRolFK=$request->get('us_idRolFK');
        $usuario->us_idCursoFK = $request->get('us_idCursoFK');
        if($usuario->us_idCursoFK==1){
        $usuario->us_idGradoFK='1';
        }
        else if($usuario->us_idCursoFK==2||$usuario->us_idCursoFK==3||$usuario->us_idCursoFK==4){
        $usuario->us_idGradoFK='2';
        }
        else if($usuario->us_idCursoFK==5||$usuario->us_idCursoFK==6||$usuario->us_idCursoFK==7){
        $usuario->us_idGradoFK='3';
        }
        else if($usuario->us_idCursoFK==8||$usuario->us_idCursoFK==9){
        $usuario->us_idGradoFK='4';
        }
        else{
        $usuario->us_idGradoFK='5';
        }
        $usuario->us_estado = $request->get('us_estado');
    	$usuario->update();
    	return Redirect::to('usuarios')->with('status', 'Usuario actualizado con éxito');
    }

    /*
    *destroy
    *Permite cambiar el estado a 0 y desactivar el item de la tabla
    *return view
    */
    public function destroy($id){
    	$usuario=User::findOrFail($id);
        $usuario->us_estado='0';
        $usuario->update();
    	return Redirect::to('usuarios')->with('status', 'Usuario deshabilitado con exito');
    }

    /*
    *reset
    *Este metodo permite capturar el id del usuario logeado para poder realizar el reinicio de la contraseña
    */
    public function reset($id){
        $usuario=User::findOrFail($id);
        return view("configuracion.usuarios.reset",["usuario"=>$usuario]);
    }

    /*
    *resetUpdate
    *Este metodo realiza la actualización en la base de datos de la contraseña
    */
    public function resetUpdate(Request $request,$id){
        $mypassword=($request->get('mypassword'));
        $usuario=User::findOrFail($id);
            if(Hash::check($mypassword, $usuario->password)){
                $usuario->password = bcrypt($request->get('password'));
                $usuario->update();
                return Redirect::to('home')->with('status', 'Contraseña actualizada con éxito');
            }
            else{
                return Redirect::to('/usuarios/reset/{{ $id }}')->with('error', 'Contraseña actual no coincide');   
            }      
    }
}
