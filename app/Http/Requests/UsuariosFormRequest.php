<?php

namespace GIDV\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class UsuariosFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>"required|unique:users,id,'.$this->usuario.|email",
            'password'=>'required|min:10|confirmed',
            'name'=>'required|max:20',
            'us_apellido'=>'required|max:20',
            'us_idDocumentoFK'=>'required|not_in:0',
            'us_numeroDocumento'=>"required|unique:users,id,'.$this->usuario.|max:11",
            'us_idRolFK'=>'required|not_in:0',
            'us_idCursoFK'=>'required|not_in:0'
        ];
    }
}
