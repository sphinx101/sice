<?php

namespace sice\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cicloescolar extends Model
{
    protected $table='cicloescolares';

    use SoftDeletes;
    protected $dates=['deleted_at'];

    protected $fillable=['nombre'];
    protected $guarded=['id'];
    protected $hidden=['created_at','updated_at'];

    public $rules=[
        'nombre' => 'required'
    ];

    /******************************* R E L A C I O N E S ***********************************/
    public function aulas(){
        return $this->hasMany('sice\Models\Aula');
    }
}
