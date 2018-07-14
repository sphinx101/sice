<?php

namespace sice\Http\Controllers\Escuela;


use sice\Http\Controllers\Controller;
use sice\Http\Requests\RequestCreatePerfil;
use sice\Repositorios\PerfilRepo;

class PerfilController extends Controller{

    private  $perfilRepo;

    public function __construct(PerfilRepo $perfilRepo){
          $this->perfilRepo=$perfilRepo;
}

    public function index(){

         return view('escuela.perfil.index');
    }


    public function store(RequestCreatePerfil $request){

        $this->perfilRepo->store($request);
         flash('Informacion Guardada con Exito!')->success()->important();
         return view('escuela.perfil.index');
    }
    public function show($docente_id)
    {
        dd($docente_id);
    }
    public function edit($docente_id)
    {
        return 'edit';
    }
    public function update(RequestEditDocente $request,$docente_id)
    {

    }

}
