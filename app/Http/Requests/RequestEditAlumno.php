<?php

namespace sice\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class RequestEditAlumno extends FormRequest
{
    private $validacion;

    public function __construct(Route $route)
    {
        $this->route = $route;
        $this->validacion = [
            'curp' => 'required',
            'nombre' => 'required|string',
            'appaterno' => 'required|string',
            'apmaterno' => 'required|string',
            'domicilio' => 'required',
            'localidad' => 'required|string',
            'municipio' => 'required|string'
        ];
    }


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
        return $this->validacion;
    }
}
