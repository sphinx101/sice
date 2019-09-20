<?php

namespace sice\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turno extends Model
{
    protected $table='turnos';

    use SoftDeletes;
    protected $dates=['deleted_at'];

    protected $fillable=['nom_turno'];
    protected $guarded=['id'];
    protected $hidden=['created_at','updated_at'];

    public $rules=[
        'nom_turno' => 'required'
    ];

    /************************** R E L A C I O N E S ********************************/

    public function aulas(){
        return $this->hasMany('sice\Models\Aula');
    }
}
