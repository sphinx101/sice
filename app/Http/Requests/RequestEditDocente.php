<?php

namespace sice\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEditDocente extends FormRequest
{
    /**
     * @var Route
     */
    private $route;

    /**
     * EditDocenteRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route){
        $this->route = $route;
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
        return [
            'rfc' => 'required|unique:docentes,rfc,'.$this->route->getParameter('docentes'),
            'curp' =>'required|unique:docentes,curp,'.$this->route->getParameter('docentes'),
            'nombre'=>'required',
            'appaterno'=>'required',
            'apmaterno'=>'required'
        ];
    }
}
