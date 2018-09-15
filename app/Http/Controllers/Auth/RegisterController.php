<?php

namespace GIDV\Http\Controllers\Auth;

use GIDV\User;
use GIDV\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'us_apellido'=>'required|max:20',
            'us_idDocumentoFK'=>'required',
            'us_numeroDocumento'=>'required|max:11',
            'us_idRolFK'=>'required',
            'us_idCursoFK'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \GIDV\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'us_apellido'=>$data['us_apellido'],
            'us_idDocumentoFK'=>$data['us_idDocumentoFK'],
            'us_numeroDocumento'=>$data['us_numeroDocumento'],
            'us_idRolFK'=>$data['us_idRolFK'],
            'us_idCursoFK'=>$data['us_idCursoFK'],
            'us_estado'=>$data['us_estado'],
        ]);
    }
}
