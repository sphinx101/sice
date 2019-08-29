<?php

namespace sice\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model{

    protected $table='alumnos';
    protected $touches = ['centrotrabajo'];//actualizacion automatica de timestamps updated_at de centrotrabajo

    use SoftDeletes;
    protected $dates=['deleted_at'];

    protected $fillable=[
              'centrotrabajo_id',
              'user_id',
              'curp',
              'nombre',
              'appaterno',
              'apmaterno',
              'domicilio',
              'localidad',
              'municipio'
    ];
    protected $guarded=['id'];
    protected $hidden=['created_at','updated_at'];

    public static $rules=[

             'curp'             =>'required|unique:alumnos|min:18:max:18',
             'nombre'           =>'required|string',
             'appaterno'        =>'required|string',
             'apmaterno'        =>'required|string',
             'domicilio'        =>'required',
             'localidad'        =>'required|string',
             'municipio'        =>'required|string'
    ];

    /************************* R E L A C I O N E S *************************/

    public function centrotrabajo(){
        return $this->belongsTo('sice\Models\Centrotrabajo');
    }
    public function user(){
        return $this->belongsTo('sice\User');
    }

    public function padretutores()
    {
        return $this->belongsToMany('sice\Models\Padretutor')->withTimestamps()->withPivot('parentesco_id');
    }

    public function parentescos()
    {
        return $this->belongsToMany('sice\Models\Parentesco', 'alumno_padretutor')->withTimestamps()->withPivot('padretutor_id');
    }

    /************************* MUTADORES Y ACCESORES **********************/
    public function getNombreCompletoAttribute(){
        return $this->nombre.' '.$this->appaterno.' '.$this->apmaterno;
    }
}
