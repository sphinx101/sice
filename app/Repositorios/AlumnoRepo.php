<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 16/07/2018
 * Time: 10:12 PM
 */

namespace sice\Repositorios;


use Illuminate\Support\Facades\DB;
use sice\User;

class AlumnoRepo{

    public function store($data){
        try{
            DB::transaction(function () use($data){

                $user=User::create([
                    'username'=>$data['curp'],
                    'email'=>$data['curp'].'@sice.local',
                    'type'=>'alumno',
                    'password'=>bcrypt('123456')
                ]);
                $rol=\sice\Models\Role::where('name','alumno')->get();
                $user->attachRole($rol[0]);
                $user->alumno()->create([
                    'centrotrabajo_id'=>$data['centrotrabajo_id'],
                    'curp'            =>$data['curp'],
                    'nombre'          =>$data['nombre'],
                    'appaterno'       =>$data['appaterno'],
                    'apmaterno'       =>$data['apmaterno'],
                    'domicilio'       =>$data['domicilio'],
                    'localidad'       =>$data['localidad'],
                    'municipio'       =>$data['municipio']

                ]);
            });
        }catch (\Exception $e){
               return ['mensaje'=>$e->getMessage(),'success'=>false];
        }

        return ['mensaje'=>'Alumno Registrado con Exito','success'=>true];
    }

    public function retrieveAlumnosTutores(){

    }

}