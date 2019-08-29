<?php

namespace sice\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parentesco extends Model
{

    protected $table = 'parentescos';

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['tipo'];
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];

    /********************************** R E L A C I O N E S ************************************/
    public function alumnos()
    {
        return $this->belongsToMany('sice\Models\Alumno', 'alumno_padretutor')->withTimestamps()->withPivot('padretutor_id');
    }

    public function padretutores()
    {
        $this->belongsToMany('sice\Models\Padretutor', 'alumno_padretutor')->withTimestamps()->withPivot('alumno_id');
    }

}
