<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 02/07/2018
 * Time: 09:55 PM
 */

namespace sice\Repositorios;


use sice\models\Centrotrabajo;

class CentrotrabajoRepo{

    public function retrieveAll(){
        $cts=Centrotrabajo::all();
        $datos=array();
        $i=0;
        foreach($cts as $ct){
            $datos[$i]['id']=$ct->id;
            $datos[$i]['cct']=$ct->cct;
            $datos[$i]['nombre']=$ct->nombre;
            $i++;
        }

        return $datos;
    }

}