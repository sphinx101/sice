<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 12/07/2018
 * Time: 08:39 PM
 */

namespace sice\Repositorios;


use sice\Models\Docente;

class PerfilRepo{

    public function store($data){

        return Docente::create([
            'centrotrabajo_id'=>$data['centrotrabajo_id'],
            'user_id'=>$data['user_id'],
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
    }

}