<?php
/**
 * Created by PhpStorm.
 * User: sphinx
 * Date: 14/09/2019
 * Time: 11:35 AM
 */

namespace sice\Repositorios;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use sice\Models\Aula;

class AulaRepo{

    private $rs = [];

    public function obtenerAulasAsignadas($ct_id){
        $aulas=Aula::with(['docente','cicloescolar','turno','grado','grupo'])
                    ->whereHas('docente',function($query)use($ct_id){
                         return $query->where('centrotrabajo_id',$ct_id);
                    })->get();
        return $aulas;
    }

    public function delete($aula_id){
        $OK_HTTP = 200;
        $FAIL_HTTP = 422;
        $this->rs = [
            'info' => [
                'message' => '',
                'statusDelete' => '',
            ],
            'errors' => [
                'description' => '',
                'type_error' => '',
                'code_error' => ''
            ],
            'http_code' => ''
        ];
        try{
            DB::transaction(function ()use($aula_id){
                $aula=Aula::find($aula_id)->delete();
                $this->rs['info']['message']='Registro Eliminado';
                $this->rs['info']['statusDelete']=true;
            });
            $this->rs['http_code']=$OK_HTTP;

        }catch (QueryException $qEx){
            $this->rs['errors']['description']=$qEx->getMessage();
            $this->rs['errors']['type_error']=$qEx->errorInfo;
            $this->rs['errors']['code_error']=$qEx->getCode();
            $this->rs['http_code']=$FAIL_HTTP;
        }catch(ModelNotFoundException $mEx){
            $this->rs['errors']['description']=$mEx->getMessage();
            $this->rs['errors']['type_error']=$mEx->getModel();
            $this->rs['errors']['code_error']=$mEx->getCode();
            $this->rs['http_code']=$FAIL_HTTP;
        }catch (\Exception $e){
            $this->rs['errors']['description']=$e->getMessage();
            $this->rs['errors']['type_error']=$e->getFile();
            $this->rs['errors']['code_error']=$e->getCode();
            $this->rs['http_code']=$e->getCode();
        }

        return $this->rs;

    }

}