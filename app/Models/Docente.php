<?php

namespace sice\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Docente extends Model{

    protected $table='docentes';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable=[
                        'centrotrabajo_id',
                        'user_id',
                        'rfc',
                        'curp',
                        'nombre',
                        'appaterno',
                        'apmaterno',
                        'domicilio',
                        'localidad',
                        'municipio',
                        'telefono',
                        'celular',
                        'actualizado'
    ];
    protected $guarded=['id'];
    protected $hidden=['created_at','updated_at'];

    public static $rules=[
                  'centrotrabajo_id'=>'required',
                  'user_id'=>'required',
                  'rfc'=>'required|unique:docentes',
                  'curp'=>'required|unique:docentes',
                  'nombre'=>'required',
                  'appaterno'=>'required',
                  'apmaterno'=>'required',
                  'domicilio'=>'required',
                  'localidad'=>'required',
                  'municipio'=>'required',
    ];

    //********************************* R E L A C I O N E S *****************************************
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('sice\User');
    }

    //********************************* Q U E R Y  S C O P E ****************************************
    /**
     * @param $query
     * @param $user_id
     * @return Collection(Docente Model)
     */
    public function scopeAllDocentesForAdmin($query,$user_id){
        return $query->where('user_id','<>',$user_id);
    }

    /***************** A C C E S O R E S   Y   M U T A D O R E S *****************************/

    public function getNombreCompletoAttribute(){
        return $this->nombre.' '.$this->appaterno.' '.$this->apmaterno;
    }
    public function getCurpNombrecompletoAttribute(){
        return $this->curp.' - '.$this->nombre.' '.$this->appaterno.' '.$this->apmaterno;
    }

}
