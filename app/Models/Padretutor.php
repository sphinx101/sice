<?php

namespace sice\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Padretutor extends Model
{

    protected $table = 'padretutores';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre',
        'appaterno',
        'apmaterno',
        'telefono',
        'celular',
        'domicilio',
        'localidad',
        'ocupacion',
        'escolaridad'
    ];
    protected $guarded = 'id';
    protected $hidden = ['created_at', 'updated_at'];

    public static $rules = [
        'curp' => 'required|min:18:max:18',
        'nombre' => 'required|string',
        'appaterno' => 'required|string',
        'apmaterno' => 'required|string',
        'domicilio' => 'required',
        'localidad' => 'required|string',
        'municipio' => 'required|string'

    ];

    /*************************************** R E L A C I O N E S **********************************/
    public function alumnos()
    {
        return $this->belongsToMany('sice\Models\Alumno')->withTimestamps()->withPivot('parentesco_id');
    }

    public function parentescos()
    {
        return $this->belongsToMany('sice\Models\Parentesco', 'alumno_padretutor')->withTimestamps()->withPivot('alumno_id');
    }


    /************************** A C C E S O R E S    Y    M U T A D O R E S ********************/
    public function getNombreCompletoAttribute()
    {
        return $this->nombre . ' ' . $this->appaterno . ' ' . $this->apmaterno;
    }

}
