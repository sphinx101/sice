<?php

namespace sice\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grado extends Model
{
    protected $table='grados';

    use SoftDeletes;
    protected $dates=['deleted_at'];

    protected $fillable=['nom_grado'];
    protected $guarded=['id'];
    protected $hidden=['created_at','updated_at'];

    public $rules=[
        'nom_grado' => 'required'
    ];

    /**************************** R E L A C I O N E S  *********************************/

    public function aulas(){
        return $this->hasMany('sice\Models\Aula');
    }
}
