<?php

namespace GIDV\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudiantesFormRequest extends FormRequest
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
            'nombre'=>'required|max:20',
            'apellido'=>'required|max:20',
            'codigo'=>'required|numeric',
            'numeroDocumento'=>"required|unique:estudiantes,es_idEstudiante|numeric",
            'idCurso'=>'required|not_in:0',
            'fotoEstudiante'=>'mimes:jpeg,bmp,png'
        ];
    }
}
