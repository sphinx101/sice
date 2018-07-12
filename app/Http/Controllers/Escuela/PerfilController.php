<?php

namespace sice\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use sice\Http\Controllers\Controller;
use sice\Http\Requests\RequestCreateDocente;
use sice\Repositorios\DocenteRepo;

class PerfilController extends Controller{

    private  $docenteRepo;

    public function __construct(DocenteRepo $docenteRepo){
          $this->docenteRepo=$docenteRepo;
    }

    public function index(){

         return view('escuela.perfil.index');
    }


    public function store(RequestCreateDocente $request){
         $this->docenteRepo->store($request);
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
