<?php

namespace sice\Http\Controllers\Escuela;


use Illuminate\Support\Facades\Auth;
use sice\Http\Controllers\Controller;
use sice\Http\Requests\RequestCreatePerfil;
use sice\Repositorios\CentrotrabajoRepo;
use sice\Repositorios\DocenteRepo;
use sice\Repositorios\PerfilRepo;

class PerfilController extends Controller{

    private  $perfilRepo;
    private  $centrotrabajoRepo;

    public function __construct(PerfilRepo $perfilRepo,CentrotrabajoRepo $centrotrabajoRepo){
          $this->perfilRepo=$perfilRepo;
          $this->centrotrabajoRepo=$centrotrabajoRepo;
    }

    public function index(){

        $vista='escuela.perfil.index';
        $booCrearUsuario=false;
        $ccts=$this->centrotrabajoRepo->pluckCCT();
        if(!DocenteRepo::booUsuarioDocenteRegistrado(Auth::id())) {
            $vista = 'escuela.perfil.create';
            $mensaje='Es necesario registrar su informacion Personal para visualizar las opciones del Menu';
            flash($mensaje)->warning()->important();
        }

        return view($vista,compact('ccts',$ccts,'booCrearUsuario',$booCrearUsuario));

    }


    public function store(RequestCreatePerfil $request){

        $this->perfilRepo->store($request);
         flash('Informacion Guardada con Exito!')->success()->important();
         return view('escuela.perfil.index');
    }
    public function show($perfil)
    {
        dd('metodo para mostra informacion de un docente en especifico');
    }
    public function edit($docente_id)
    {
        return 'edit';
    }
    public function update(RequestEditDocente $request,$docente_id)
    {

    }

}
