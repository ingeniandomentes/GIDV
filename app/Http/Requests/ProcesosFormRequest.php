<?php

namespace GIDV\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcesosFormRequest extends FormRequest
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
            'nombre'=>'required|max:25',
            'materia'=>'required|not_in:0',
            'periodo'=>'required|not_in:0',
            'grado'=>'required|not_in:0'
        ];
    }
}
