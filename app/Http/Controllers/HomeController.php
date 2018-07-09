<?php

namespace sice\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use sice\Repositorios\DocenteRepo;

class HomeController extends Controller
{
    private $docenteRepo;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DocenteRepo $docenteRepo){
        //$this->middleware('auth');
        $this->docenteRepo=$docenteRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   $vista='perfil';

        $booDocenteRegistrado=$this->docenteRepo->booUsuarioDocenteRegistrado(Auth::id());
        if($booDocenteRegistrado)
           $vista='home';


        return view($vista);
    }
}
