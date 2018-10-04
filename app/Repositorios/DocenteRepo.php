<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 02/07/2018
 * Time: 09:36 PM
 */

namespace sice\Repositorios;



use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Schema;
use sice\Http\Requests\RequestEditDocente;
use sice\Models\Docente;
use sice\User;

class DocenteRepo{
    protected $isModified=false;
    private $rs=[];

    public function allDocentes_paginate(){
       //return Docente::orderBy('id','ASC')->paginate(10);
        return Docente::with('user')
                      ->with('centrotrabajo')
                      ->where('docentes.id','<>',\Auth::user()->docente->id)
                      ->paginate(10);

    }

    public function retrieveDocentesByCurp($curp){

        if(Auth::user()->type=='supervisor'){
            //return Docente::where('docentes.curp', 'LIKE','%'.$curp.'%')->paginate(10);
            return Docente::with('user')
                          ->with('centrotrabajo')
                          ->where('docentes.id','<>',\Auth::user()->docente->id)
                          ->where('docentes.curp','LIKE','%'.$curp.'%')
                          ->paginate(10);
        }else{

        }
    }

    public function findDocente($id){
        $rs=Docente::with('user')->with('centrotrabajo')->find($id);
        return $rs;
    }

    public static function booUsuarioDocenteRegistrado($user_id){
       $existe=false;
       $user= User::find($user_id);
       if($user->docente!=null)
           $existe=true;
       return $existe;
    }

    public function retrieveDocentesByCT(){
          $docentes=Docente::join('centrotrabajos as ct','ct.id','=','docentes.centrotrabajo_id')
                           ->orderBy('ct.id')
                           ->select('ct.id as ct_id','ct.cct','ct.nombre as ct_nom','docentes.*')->get();
          $data[][]='';
          $i=-1;
          $j=0;
          $ct_temp=0;

          foreach($docentes as $docente){
              if($docente->ct_id !== $ct_temp){
                  $i++;
                  $data[$i][$j]['ct_id']=$docente->ct_id;
                  $data[$i][$j]['docente']=$docente->nombre_completo;
                  $data[$i][$j]['domicilio']=$docente->domicilio;
                  $data[$i][$j]['municipio']=$docente->ubicacion_completa;

              }else{
                  $j++;
                  //$data[$i][$j][]=$docente->ct_id;
                  $data[$i][$j]['docente']=$docente->nombre_completo;
                  $data[$i][$j]['domicilio']=$docente->domicilio;
                  $data[$i][$j]['municipio']=$docente->ubicacion_completa;
              }
              $ct_temp=$docente->ct_id;
          }
          dd($data);
    }



    public function store($data){

        try{
            DB::transaction(function () use ($data){
                $type=\sice\Models\Role::where('id',$data['type'])->first()->name;
                $user=User::create([
                    'username'=>$data['curp'],
                    'email'=>$data['email'],
                    'type'=>$type,
                    'password'=>bcrypt('123456')
                ]);
                $rol=\sice\Models\Role::where('name',$type)->get();
                $user->attachRole($rol[0]);

                $user->docente()->create([
                    'centrotrabajo_id'=>$data['centrotrabajo_id'],
                    'rfc'=>$data['rfc'],
                    'curp'=>$data['curp'],
                    'nombre'=>$data['nombre'],
                    'appaterno'=>$data['appaterno'],
                    'apmaterno'=>$data['apmaterno'],
                    'domicilio'=>$data['domicilio'],
                    'localidad'=>$data['localidad'],
                    'municipio'=>$data['municipio'],
                    'telefono'=>$data['telefono'],
                    'celular'=>$data['celular'],
                    'actualizado'=>$data['actualizado']
                ]);


            });
        }catch (\Exception $e){
            return ['mensaje'=>$e->getMessage(),'valor'=>false];
        }

        return ['mensaje'=>'','valor'=>true];


    }

    public function delete($id){

        try{
            DB::transaction(function() use ($id){
               $docente=Docente::find($id)->user->delete();

            });

        } catch(QueryException $qe){
            return [
                'mensaje' => $qe->getMessage(),
                'status'  => false,
                'code'    => 404
            ];
        } catch (\Exception $e){
            return [
                   'mensaje' => $e->getMessage(),
                   'status'  => false,
                   'code'    => 500
            ];
        }

        return [
               'mensaje' => 'Registro Eliminado',
               'status'  => true,
               'code'    => 200
        ];

    }

    public function update(RequestEditDocente $request,$docente_id){

        $OK_HTTP=200;
        $FAIL_HTTP=422;
        $this->rs=[
            'info'=>[
                 'message' => '',
                 'statusUpdate'  => '',
            ],
            'errors'=>[
                 'description' => '',
                 'type_error'  => '',
                 'code_error'  => ''
            ],
            'http_code' =>''
        ];

        $docente_original=Docente::with('user')->find($docente_id);
        try{

            DB::transaction(function() use($request,$docente_id,$docente_original){
                if($this->VerifyChange($docente_original,$request)){
                    $docente_original->actualizado=1;
                    $docente_original->user->id=$docente_id;
                    $docente_original->user->save();
                    $docente_original->save();
                    $this->rs['info']['message']='Registro Actualizado';
                    $this->rs['info']['statusUpdate']=true;
                }else{
                    $this->rs['info']['message']='No se registro ningun cambio en la informacion para actualizar';
                    $this->rs['info']['statusUpdate']=false;
                }


            });

            $this->rs['http_code']=$OK_HTTP;
            return $this->rs;

        }catch (QueryException $qe){
            $this->rs['errors']['description']=$qe->getMessage();
            $this->rs['errors']['type_error']=$qe->errorInfo;
            $this->rs['errors']['code_error']=$qe->getCode();
            $this->rs['http_code']=$FAIL_HTTP;
        }catch (ModelNotFoundException $me){
            $this->rs['errors']['description']=$me->getMessage();
            $this->rs['errors']['type_error']=$me->getModel();
            $this->rs['errors']['code_error']=$me->getCode();
            $this->rs['http_code']=$FAIL_HTTP;
        }catch(\Exception $e){
            $this->rs['errors']['description']=$e->getMessage();
           // $this->rs['errors']['type_error']=$e->
            $this->rs['errors']['code_error']=$e->getCode();
            $this->rs['http_code']=500;
        }
        return $this->rs;

    }

    public function VerifyChange(Docente $docente,RequestEditDocente $request){

          $DocenteField=Schema::getColumnListing('docentes');
          foreach($DocenteField as $field){
              if(isset($request[$field])){
                 if($docente[$field]!==$request[$field]){
                         $this->isModified=true;
                         $docente[$field]=$request[$field];
                 }

              }else{
                  if(isset($request['email'])){
                      if($docente->user->email !== $request['email']){
                          $docente->user->email=$request['email'];
                          $this->isModified=true;
                      }
                  }
              }
          }

         return $this->isModified;

    }







}