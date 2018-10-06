<?php

namespace GIDV\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PDFEsRequest extends FormRequest
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
            'periodoEs'=>'requeried|not_in:0',
            'estudiante'=>'requeried|not_in:0',
            'anioEs'=>'requeried|not_in:0',
        ];
    }
}
