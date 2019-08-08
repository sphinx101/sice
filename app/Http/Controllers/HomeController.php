<?php

namespace sice\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use sice\Repositorios\CentrotrabajoRepo;
use sice\Repositorios\DocenteRepo;

class HomeController extends Controller
{
    private $docenteRepo;
    private $centrotrabajoRepo;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DocenteRepo $docenteRepo,CentrotrabajoRepo $centrotrabajoRepo){
        //$this->middleware('auth');
        $this->docenteRepo=$docenteRepo;
        $this->centrotrabajoRepo=$centrotrabajoRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $vista='escuela.perfil.create';

        $booDocenteRegistrado=$this->docenteRepo->booUsuarioDocenteRegistrado(Auth::id());
        $ccts=$this->centrotrabajoRepo->pluckCCT();
        $booCrearUsuario = false;  //Bandera para crear  usuario ligado a un docente nuevo cuando este es registrado por medio del supervisor
        if ($booDocenteRegistrado || Auth::user()->type === 'alumno') {
            $vista = 'home';
        }else{
            $mensaje='Es necesario registrar su informacion Personal para visualizar las opciones del Menu';
            flash($mensaje)->warning()->important();
        }

        return view($vista,compact('ccts',$ccts,'booCrearUsuario',$booCrearUsuario));
    }
}
