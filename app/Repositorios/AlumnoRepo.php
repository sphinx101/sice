<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 16/07/2018
 * Time: 10:12 PM
 */

namespace sice\Repositorios;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use sice\Http\Requests\RequestCreateAlumno;
use sice\Http\Requests\RequestEditAlumno;
use sice\Models\Alumno;
use sice\User;

class AlumnoRepo{
    protected $isModified = false;
    private $rs = [];


    public function store($data){
        try{
            DB::transaction(function () use($data){

                $user=User::create([
                    'username'=>$data['curp'],
                    'email'=>$data['curp'].'@sice.local',
                    'type'=>'alumno',
                    'password'=>bcrypt('123456')
                ]);
                $rol=\sice\Models\Role::where('name','alumno')->get();
                $user->attachRole($rol[0]);
                $user->alumno()->create([
                    'centrotrabajo_id'=>$data['centrotrabajo_id'],
                    'curp'            =>$data['curp'],
                    'nombre'          =>$data['nombre'],
                    'appaterno'       =>$data['appaterno'],
                    'apmaterno'       =>$data['apmaterno'],
                    'domicilio'       =>$data['domicilio'],
                    'localidad'       =>$data['localidad'],
                    'municipio'       =>$data['municipio']

                ]);
            });
        }catch (\Exception $e){
               return ['mensaje'=>$e->getMessage(),'success'=>false];
        }

        return ['mensaje'=>'Alumno Registrado con Exito','success'=>true];
    }

    public function update(RequestEditAlumno $request, $alumno_id)
    {

        $OK_HTTP = 200;
        $FAIL_HTTP = 422;
        $this->rs = [
            'info' => [
                'message' => '',
                'statusUpdate' => '',
            ],
            'errors' => [
                'description' => '',
                'type_error' => '',
                'code_error' => ''
            ],
            'http_code' => ''
        ];

        $alumno_original = Alumno::find($alumno_id);
        try {

            DB::transaction(function () use ($alumno_original, $request) {
                if ($this->VerifyChange($alumno_original, $request)) {
                    $alumno_original->save();
                    $this->rs['info']['message'] = 'Registro Actualizado';
                    $this->rs['info']['statusUpdate'] = true;
                } else {
                    $this->rs['info']['message'] = 'No se registro ningun cambio en la informacion para actualizar';
                    $this->rs['info']['statusUpdate'] = false;

                }
            });
            $this->rs['http_code'] = $OK_HTTP;
            return $this->rs;

        } catch (QueryException $qe) {
            $this->rs['errors']['description'] = $qe->getMessage();
            $this->rs['errors']['type_error'] = $qe->errorInfo;
            $this->rs['errors']['code_error'] = $qe->getCode();
            $this->rs['http_code'] = $FAIL_HTTP;
        } catch (ModelNotFoundException $me) {
            $this->rs['errors']['description'] = $me->getMessage();
            $this->rs['errors']['type_error'] = $me->getModel();
            $this->rs['errors']['code_error'] = $me->getCode();
            $this->rs['http_code'] = $FAIL_HTTP;
        } catch (\Exception $e) {
            $this->rs['errors']['description'] = $e->getMessage();
            // $this->rs['errors']['type_error']=$e->
            $this->rs['errors']['code_error'] = $e->getCode();
            $this->rs['http_code'] = 500;
        }

        return $this->rs;


    }

    public function delete($alumno_id)
    {
        $OK_HTTP = 200;
        $FAIL_HTTP = 422;
        $this->rs = [
            'info' => [
                'message' => '',
                'statusUpdate' => '',
            ],
            'errors' => [
                'description' => '',
                'type_error' => '',
                'code_error' => ''
            ],
            'http_code' => ''
        ];
        try {
            DB::transaction(function () use ($alumno_id) {

            });
        } catch (QueryException $qEx) {

        } catch (ModelNotFoundException $mEx) {

        } catch (\Exception $e) {

        }
    }

    public function retrieveAlumnosTutores($centrotrabajo_id)
    {

        $alumnos = Alumno::with('padretutores')->where('centrotrabajo_id', $centrotrabajo_id)->get();

        return $alumnos; //json_encode($alumnos);
    }


    public function VerifyChange(Alumno $alumno, RequestEditAlumno $request)
    {

        $AlumnoField = Schema::getColumnListing('alumnos');
        foreach ($AlumnoField as $field) {
            if (isset($request[$field])) {
                if ($alumno[$field] !== $request[$field]) {
                    $this->isModified = true;
                    $alumno[$field] = $request[$field];
                }

            }
        }

        return $this->isModified;

    }

}