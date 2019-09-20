<?php

namespace sice\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use sice\Repositorios\AulaRepo;
use sice\Http\Controllers\Controller;

class AulaController extends Controller
{
    private $aulaRepo;

    public function __construct(AulaRepo $aulaRepo){
        $this->aulaRepo=$aulaRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('escuela.aula.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escuela.aula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($aula_id)
    {
       $rs=$this->aulaRepo->delete($aula_id);
       return response()->json($rs,$rs['http_code']);
    }


    /************************* solicitudes ajax ************************/

    public function obtenerAulasAsignadas(){
        $ct_id=Auth::user()->docente->centrotrabajo_id;

        $aulas_asignadas=$this->aulaRepo->obtenerAulasAsignadas($ct_id);

        return response()->json($aulas_asignadas,200);

    }
}
