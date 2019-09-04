<?php

namespace sice;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','type'
    ];

    protected $guarded=['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','created_at','updated_at'
    ];

    protected $dates = ['deleted_at'];

    //******************************* R E L A C I O N E S ********************************88
    public function docente(){
        return $this->hasOne('sice\Models\Docente');
    }
    public function alumno(){
        return $this->hasOne('sice\Models\Alumno');
    }
}
