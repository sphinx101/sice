<?php

namespace sice\Http\Controllers\Escuela;

use Illuminate\Http\Request;
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
    public function index(Request $request){


        return view('escuela.docente.index');
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
    /*public function edit(Docente $docente)
    {
        return 'edit';
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sice\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(RequestEditDocente $request, $docente_id){

        $rs=$this->docenteRepo->update($request,$docente_id);
        return response()->json($rs,$rs['http_code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sice\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $rs=$this->docenteRepo->delete($id);
        if($rs['status']){
            return response()->json($rs,200);
        }

        return response()->json($rs,$rs['code']);

    }


    public function ObtenerDocentes(Request $request){


               if(isset($request['curp']) && $request['curp']!=''){
                   $docentes=$this->docenteRepo->retrieveDocentesByCurp($request['curp']);
               }else{
                   $docentes=$this->docenteRepo->allDocentes_paginate();
               }


            return [
                'pagination' =>[
                    'total'          => $docentes->total(),
                    'current_page'   => $docentes->currentPage(),
                    'per_page'       => $docentes->perPage(),
                    'last_page'      => $docentes->lastPage(),
                    'from'           => $docentes->firstItem(),
                    'to'             => $docentes->lastItem(),
                ],
                'docentes' => $docentes
            ];




    }
    /*public function findDocenteCurp(Request $request){
        $docentes=$this->docenteRepo->retrieveDocentesByCurp($request['curp']);
        return [
            'pagination' =>[
                'total'          => $docentes->total(),
                'current_page'   => $docentes->currentPage(),
                'per_page'       => $docentes->perPage(),
                'last_page'      => $docentes->lastPage(),
                'from'           => $docentes->firstItem(),
                'to'             => $docentes->lastItem(),
            ],
            'docentes' => $docentes
        ];
    }*/
}
