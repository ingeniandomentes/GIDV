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
     *
     * @return array
     */
    public function rules()
    {
        return [
        //Calificaciones
        'ca_anioCalificacion'=>'required',
        /*'ca_idEstudianteFK'*/'estudiante'=>'required',
        'ca_idPeriodoFK'=>'required|not_in:0',
        'ca_idMateriaFK'=>'required|not_in:0',
        'ca_idProcesoFK'=>'required|not_in:0',
        'ca_idCompetenciaFK'=>'required|not_in:0',
        'ca_idNotaFK'=>'required|not_in:0',
        //Notas Generales
        /*'ng_idEstudianteFK'=>'required',*/
        'ng_idMateriaFK'=>'required|not_in:0',
        'ng_fallas'=>'required|numeric',
        'ng_idNotaFK'=>'required|not_in:0',
        //Observaciones Generales
        /*'og_idEstudianteFK'=>'required',*/
        'og_idTipoObservacionFK'=>'required|not_in:0',
        'og_idObservacionesFK'=>'required|not_in:0'
        ];
    }
}
