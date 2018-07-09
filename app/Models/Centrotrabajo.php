<?php

namespace sice\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Centrotrabajo extends Model{

    public  $table='centrotrabajos';

    use SoftDeletes;
    protected $dates=['deleted_at'];

    public $fillable=['cct','nombre'];

    public $hidden=['created_at','updated_at'];

    public static $rules=[
                'cct'=>'required|unique:centrotrabajos'
    ];

    //******************************** R E L A C I O N E S *****************************8
    public function docentes(){
        return $this->hasMany('sice\Models\Docente');
    }



    /********************************* Accesores y Mutadores ****************************************/

    public function getNombreCompletoAttribute(){

        return $this->cct.' '.$this->nombre;
    }
}
