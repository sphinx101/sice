<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 02/07/2018
 * Time: 09:36 PM
 */

namespace sice\Repositorios;


use Illuminate\Support\Facades\Auth;
use sice\Models\Docente;
use sice\User;

class DocenteRepo{

   public function booUsuarioDocenteRegistrado($user_id){
       $existe=false;
       $user= User::find($user_id);
       if($user->docente!=null)
           $existe=true;
       return $existe;
   }

    public function store($data){

        return Docente::create($data->all());
    }


}