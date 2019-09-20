<?php

namespace sice\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aula extends Model{

    protected $table='aulas';
   // protected $touches = ['centrotrabajo'];//actualizacion automatica de timestamps updated_at de centrotrabajo

    use SoftDeletes;
    protected $dates=['deleted_at'];

    protected $fillable=[
              'docente_id',
              'turno_id',
              'grupo_id',
              'grado_id',
              'cicloescolar_id'
    ];
    protected $guarded=['id'];
    protected $hidden=['created_id','updated_id'];

    public static $rules=[
           'docente_id' => 'required',
           'turno_id'   => 'required',
           'grupo_id'   => 'required',
           'grado_id'   => 'required',
           'cicloescolar_id' => 'required'
    ];

    /********************************* R E L A C I O N E S ****************************************/

    public function alumnos(){
        return $this->belongsToMany('sice\Models\Alumno','inscripciones')->withTimestamps();
    }

    public function docente(){
        return $this->belongsTo('sice\Models\Docente');
    }

    public function cicloescolar(){
        return $this->belongsTo('sice\Models\Cicloescolar');
    }

    public function turno(){
        return $this->belongsTo('sice\Models\Turno');
    }

    public function grado(){
        return $this->belongsTo('sice\Models\Grado');
    }

    public function grupo(){
        return $this->belongsTo('sice\Models\Grupo');
    }


}
