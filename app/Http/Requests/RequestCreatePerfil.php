<?php

namespace sice\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCreatePerfil extends FormRequest
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
            'centrotrabajo_id'=>'required',
            'rfc'=>'required|unique:docentes|min:10|max:13',
            'curp'=>'required|unique:docentes|max:18',
            'nombre'=>'required',
            'appaterno'=>'required',
            'apmaterno'=>'required',
            'domicilio'=>'required',
            'localidad'=>'required',
            'municipio'=>'required',

        ];
    }
}
