<?php

namespace sice\Http\Controllers\Escuela;

use sice\Http\Requests\RequestCreateDocente;
use sice\Http\Requests\RequestEditDocente;
use sice\Models\Docente;
use Illuminate\Http\Request;
use sice\Http\Controllers\Controller;
use sice\Repositorios\CentrotrabajoRepo;

class DocenteController extends Controller{


    private $docenteRepo;

    private $ctRepo;

    function __contruct(DocenteRepo $docenteRepo,CentrotrabajoRepo $ctRepo){
        $this->docenteRepo=$docenteRepo;
        $this->ctRepo=$ctRepo;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return 'vista para dar de alta docentes';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreateDocente $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \sice\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        dd($docente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sice\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sice\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(RequestEditDocente $request, Docente $docente)
    {
        dd($docente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sice\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        //
    }
}
