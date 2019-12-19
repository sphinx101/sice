@extends('adminlte::page')

@section('title','Aulas Asignadas')

@section('content_header')
    <h1>Aulas Asignadas</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li><i class="fa fa-user-circle"></i> Docente</li>
        <li class="active">Aulas Asignadas</li>
    </ol>
@stop
@section('content')
    <div class="row" id="main_aula">
        <div class="box box-solid box-default">
            <div class="box-header with-border">
                 <h3 class="box-title">Docente en Aula</h3>
                 <div class="box-tools">
                     <div class="form-group">
                         <label for="lblcurp" class="sr-only">CURP</label>
                         <input class="form-control" id="lblcurp" placeholder="CURP Docente" name="curp" type="search"
                                v-model="buscar_curp">
                     </div>
                 </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover-table-sprite">
                        <thead>
                            <th>Ciclo Escolar</th>
                            <th>Docente</th>
                            <th>CURP</th>
                            <th>Grado</th>
                            <th>Grupo</th>
                            <th>Turno</th>
                            <th># Alumnos</th>
                            <th width="100px"></th>
                        </thead>
                       {{-- <tbody>
                            <tr v-for="aula in aulas">
                                <td v-text="aula.cicloescolar.nombrre"></td>
                                <td v-text="aula.docente.nombre+' '+aula.docente.appaterno+' '+aula.docente.apmaterno" class="text-capitalize"></td>
                                <td v-text="aula.docente.curp"></td>
                                <td v-if="aula.grado.nom_grado==='primero'">     <span v-text="aula.grado.nom_grado" class="label label-success text-uppercase"></span></td>
                                <td v-else-if="aula.grado.nom_grado==='segundo'"><span v-text="aula.grado.nom_grado" class="label label-warning text-uppercase"></span></td>
                                <td v-else-if="aula.grado.nom_grado==='tercero'"><span v-text="aula.grado.nom_grado" class="label label-danger text-uppercase"></span></td>
                                <td v-if="aula.grupo.nom_grupo==='A'">     <span v-text="aula.grupo.nom_grupo" class="label label-warning text-uppercase"></span></td>
                                <td v-else-if="aula.grupo.nom_grupo==='B'"><span v-text="aula.grupo.nom_grupo" class="label label-primary text-uppercase"></span></td>
                                <td v-else-if="aula.grupo.nom_grupo==='C'"><span v-text="aula.grupo.nom_grupo" class="label label-success text-uppercase"></span></td>
                                <td v-if="aula.turno.nom_turno==='matutino'">  <span v-text="aula.turno.nom_turno" class="label label-danger text-uppercase"></span></td>
                                <td v-if="aula.turno.nom_turno==='vespertino'"><span v-text="aula.turno.nom_turno" class="label label-primary text-uppercase"></span></td>
                                <td>29/30</td>
                                <td>
                                    <a href="#" @click.prevent="questionDelete(aula)" class="btn btn-danger btn-sm" role="button"><i class="fa fa-eraser" aria-hidden="true"></i></a>
                                </td>
                            </tr>

                        </tbody>--}}
                        <paginate
                             name="aulas_paginadas"
                             :list="busquedaCurp"
                             :per="5"
                             tag="tbody"
                        >
                            <tr v-for="aula in paginated('aulas_paginadas')">
                                <td v-text="aula.cicloescolar.nombrre"></td>
                                <td v-text="aula.docente.nombre+' '+aula.docente.appaterno+' '+aula.docente.apmaterno" class="text-capitalize"></td>
                                <td v-text="aula.docente.curp"></td>
                                <td v-if="aula.grado.nom_grado==='primero'">     <span v-text="aula.grado.nom_grado" class="label label-success text-uppercase"></span></td>
                                <td v-else-if="aula.grado.nom_grado==='segundo'"><span v-text="aula.grado.nom_grado" class="label label-warning text-uppercase"></span></td>
                                <td v-else-if="aula.grado.nom_grado==='tercero'"><span v-text="aula.grado.nom_grado" class="label label-danger text-uppercase"></span></td>
                                <td v-if="aula.grupo.nom_grupo==='A'">     <span v-text="aula.grupo.nom_grupo" class="label label-warning text-uppercase"></span></td>
                                <td v-else-if="aula.grupo.nom_grupo==='B'"><span v-text="aula.grupo.nom_grupo" class="label label-primary text-uppercase"></span></td>
                                <td v-else-if="aula.grupo.nom_grupo==='C'"><span v-text="aula.grupo.nom_grupo" class="label label-success text-uppercase"></span></td>
                                <td v-if="aula.turno.nom_turno==='matutino'">  <span v-text="aula.turno.nom_turno" class="label label-danger text-uppercase"></span></td>
                                <td v-if="aula.turno.nom_turno==='vespertino'"><span v-text="aula.turno.nom_turno" class="label label-primary text-uppercase"></span></td>
                                <td>29/30</td>
                                <td>
                                    <a href="#" @click.prevent="editData(aula)" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="#" @click.prevent="questionDelete(aula)" class="btn btn-danger btn-sm" role="button"><i class="fa fa-eraser" aria-hidden="true"></i></a>
                                </td>

                            </tr>
                        </paginate>
                    </table>
                    <paginate-links for="aulas_paginadas"
                                    :limit="5"
                                    :show-step-links="true"
                                    :classes="{'ul':'pagination'}"
                                    :step-links="{next: 'Siguiente', prev: 'Anterior'}"  >

                    </paginate-links>
                </div>
            </div>
            <div class="box-footer">
                 <div class="form-group pull-right">
                     <a href="{{ route('aula.create') }}" class="btn btn-primary" role="button"><span>Asignar</span></a>
                 </div>

            </div>
        </div>
        @include('escuela.aula.modalEdit')
        @include('escuela.aula.modalDelete')
    </div>
@stop

@push('js')
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-paginate/3.6.0/vue-paginate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>

        <script src="{{asset('js/aula/listarAulasAsignadas.js')}}"></script>
@endpush