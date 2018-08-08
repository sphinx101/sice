<?php

namespace sice\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class RequestEditDocente extends FormRequest
{
    /**
     * @var Route
     */
    private $route;

    private $validacion;

    /**
     * EditDocenteRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route){
        $this->route = $route;
        $this->validacion=[
            'rfc' => 'required', //|unique:docentes,rfc,'.$this->route->parameter('docentes'),
            'curp' =>'required',//|unique:docentes,curp,'.$this->route->parameter('docentes'),
            'nombre'=>'required',
            'appaterno'=>'required',
            'apmaterno'=>'required',
            'domicilio'=>'required',
            'localidad'=>'required',
            'municipio'=>'required',
            'email'=>'required|string|email|max:255'
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
    public function rules(){


        return $this->validacion;
    }
}
