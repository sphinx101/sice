<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 02/07/2018
 * Time: 09:36 PM
 */

namespace sice\Repositorios;



use Illuminate\Support\Facades\DB;

use sice\User;

class DocenteRepo{

   public static function booUsuarioDocenteRegistrado($user_id){
       $existe=false;
       $user= User::find($user_id);
       if($user->docente!=null)
           $existe=true;
       return $existe;
   }

    public function store($data){

        try{
            DB::transaction(function () use ($data){
                $type=\sice\Models\Role::where('id',$data['type'])->first()->name;
                $user=User::create([
                    'username'=>$data['curp'],
                    'email'=>$data['email'],
                    'type'=>$type,
                    'password'=>bcrypt('123456')
                ]);
                $rol=\sice\Models\Role::where('name',$type)->get();
                $user->attachRole($rol[0]);

                $user->docente()->create([
                    'centrotrabajo_id'=>$data['centrotrabajo_id'],
                    'rfc'=>$data['rfc'],
                    'curp'=>$data['curp'],
                    'nombre'=>$data['nombre'],
                    'appaterno'=>$data['appaterno'],
                    'apmaterno'=>$data['apmaterno'],
                    'domicilio'=>$data['domicilio'],
                    'localidad'=>$data['localidad'],
                    'municipio'=>$data['municipio'],
                    'telefono'=>$data['telefono'],
                    'celular'=>$data['celular'],
                    'actualizado'=>$data['actualizado']
                ]);


            });
        }catch (\Exception $e){
            return ['mensaje'=>$e->getMessage(),'valor'=>false];
        }

        return ['mensaje'=>'','valor'=>true];


    }


}