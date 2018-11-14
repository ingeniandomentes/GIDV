<?php

namespace GIDV\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalificacionesFormRequest extends FormRequest
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
     * En el request se realizan todas las validaciones dentro del formulario
     * @return array
     */
    public function rules()
    {
        return [
        //Calificaciones
        'ca_anioCalificacion'=>'required',
        'ca_idPeriodoFK'=>'required|not_in:0',
        'ca_idMateriaFK'=>'required|not_in:0',
        'ca_idProcesoFK'=>'required|not_in:0',
        'ca_idCompetenciaFK'=>'required|not_in:0',
        'ca_idNotaFK'=>'required|not_in:0',
        //Notas Generales
        'ng_idUsuarioFK'=>'required',
        'ng_idMateriaFK'=>'required|not_in:0',
        'ng_fallas'=>'required',
        'ng_idNotaFK'=>'required|not_in:0',
        //Observaciones Generales
        'og_idObservacionesFK'=>'required',
        ];
    }
}
