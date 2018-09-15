<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\UsuariosFormRequest;

use GIDV\User;

use DB;

use Hash;

class UsuariosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
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
    public function create(){
        $tipodocumentos=DB::table('tipodocumento')->where('td_estado','=','1')->get();
        $cursos=DB::table('cursos')->where('cu_estado','=','1')->get();
        $roles=DB::table('roles')->where('ro_estado','=','1')->get();
        return view("configuracion.usuarios.create",["tipodocumentos"=>$tipodocumentos,"cursos"=>$cursos,"roles"=>$roles]);
    }
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
    public function show($id){
    	return view("configuracion.usuarios.show",["usuarios"=>User::findOrFail($id)]);
    }
    public function edit($id){
        $usuarios=User::findOrFail($id);
        $tipodocumentos=DB::table('tipodocumento')->where('td_estado','=','1')->get();
        $cursos=DB::table('cursos')->where('cu_estado','=','1')->get();
        $roles=DB::table('roles')->where('ro_estado','=','1')->get();
    	return view("configuracion.usuarios.edit",["usuarios"=>$usuarios,"tipodocumentos"=>$tipodocumentos,"cursos"=>$cursos,"roles"=>$roles]);
    }
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
    public function destroy($id){
    	$usuario=User::findOrFail($id);
        $usuario->us_estado='0';
        $usuario->update();
    	return Redirect::to('usuarios')->with('status', 'Usuario deshabilitado con exito');
    }

    public function reset($id){
        $usuarios=User::findOrFail($id);
        return view("configuracion.usuarios.reset",["usuarios"=>$usuarios]);
    }

    public function resetUpdate(Request $request){
        $usuarios=User::findOrFail($id);
        $rules=[
            'mypassword'=>'required',
            'password'=>'required|confirmed|min:10',

        ];
        $message=[
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 10 caracteres',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('usuario/reset')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('/home')->with('status', 'Password cambiado con éxito');
            }
            else
            {
                return redirect('usuario/reset')->with('message', 'Credenciales incorrectas');
            }
        }
    }
}
