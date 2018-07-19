<?php

namespace sice\Http\Controllers\Escuela;

use sice\Http\Requests\RequestCreateDocente;
use sice\Http\Requests\RequestEditDocente;
use sice\Models\Docente;

use sice\Http\Controllers\Controller;
use sice\Repositorios\CentrotrabajoRepo;
use sice\Repositorios\DocenteRepo;

class DocenteController extends Controller{


    private $docenteRepo;

    private $centrotrabajoRepo;

    public function __construct(DocenteRepo $docenteRepo,CentrotrabajoRepo $centrotrabajoRepo){
        //$this->middleware('auth');
        $this->docenteRepo=$docenteRepo;
        $this->centrotrabajoRepo=$centrotrabajoRepo;
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
    public function create(){
        $ccts=$this->centrotrabajoRepo->pluckCCT();
        $booCrearUsuario=true;
        return view('escuela.docente.create',compact('ccts',$ccts,'booCrearUsuario',$booCrearUsuario));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreateDocente $request){

        $rs=$this->docenteRepo->store($request);
        if($rs['valor'])
            flash('Docente Registrado con Exito')->success()->important();
        else
            flash($rs['mensaje'])->error()->important();

        return redirect('/escuela/personal/docentes/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \sice\Models\Docente  $docente
     * @return \Illuminate\Http\Respons
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
