<?php

namespace sice\Http\Controllers\Escuela;

use Illuminate\Http\Request;
use sice\Http\Controllers\Controller;
use sice\Http\Requests\RequestCreateAlumno;
use sice\Models\Alumno;
use sice\Repositorios\AlumnoRepo;

class AlumnoController extends Controller{

    private $alumnoRepo;

    public function __construct(AlumnoRepo $alumnoRepo){
         $this->alumnoRepo=$alumnoRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('escuela.alumno.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escuela.alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreateAlumno $request){

          $rs=$this->alumnoRepo->store($request);
          if($rs['success'])
              flash($rs['mensaje'])->success()->important();
          else
              flash($rs['mensaje'])->error()->important();

          return redirect('escuela/alumnos/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        dd($alumno);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return 'formulario para editar informacion de algun alumno';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestCreateAlumno $request, Alumno $alumno)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
