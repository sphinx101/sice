@extends('adminlte::page')

@section('title','Alumnos Registrados')

@section('content_header')

    <h1>Alumnos Pre-Inscritos</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li><i class="fa fa-user-circle"></i> Alumnos</li>
        <li class="active">Registrados</li>
    </ol>
@stop

@section('content')

    <div class="row" id="main_alumnos">
        <div class="box box-solid box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Datos Generales</h3>
                <div class="box-tools ">
                    <div class="form-group">
                        {{--<form action="#" method="GET" accept-charset="UTF-8" role="form" class="form-inline text-right">

                            <label for="lblcurp" class="sr-only">CURP</label>
                            <input class="form-control" id="lblcurp" placeholder="CURP Alumno" name="curp" type="text" v-model="busqueda_curp">
                            --}}{{--<input class="btn btn-primary" type="submit" value="Buscar">--}}{{--
                            <button class="btn btn-primary" type="submit">Busqueda</button>
                            <a href="#" class="btn btn-default" role="button">Mostrar Todos</a>
                        </form>--}}
                        <label for="lblcurp" class="sr-only">CURP</label>
                        <input class="form-control" id="lblcurp" placeholder="CURP Alumno" name="curp" type="search"
                               v-model="busqueda_curp">
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover table-sprite">
                        <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>CURP</th>
                        <th width="250px">Domicilio</th>
                        <th>Localidad</th>
                        <th>Municipio</th>
                        <th>Padre/Tutor</th>
                        <th width="140px"></th>
                        </thead>
                        {{--<tbody>
                        <tr v-for="alumno in busquedaCurp">
                            <td v-text="alumno.id"></td>
                            <td v-text="alumno.nombre+' '+alumno.appaterno+' '+alumno.apmaterno"></td>
                            <td v-text="alumno.curp"></td>
                            <td v-text="alumno.domicilio"></td>
                            <td v-text="alumno.localidad"></td>
                            <td v-text="alumno.municipio"></td>
                            <template v-if="alumno.padretutores.length>0">
                                <td v-for="tutor in alumno.padretutores">
                                    <a href="#"><i class="fa fa-users"><span class="label label-success text-uppercase" v-text="tutor.nombre+' '+tutor.appaterno+' '+tutor.apmaterno"></span></i></a>

                                </td>
                            </template>
                            <template v-else>
                                <a href="#"><i class="fa fa-user-times"><span class="label label-danger text-uppercase">Sin Registrar</span></i></a>
                            </template>

                            <td>

                                <a href="#" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="#" class="btn btn-danger btn-sm" role="button"><i class="fa fa-eraser" aria-hidden="true"></i></a>
                            </td>
                        </tr>

                        </tbody>--}}

                        <paginate
                                name="alumnos_paginados"
                                :list="busquedaCurp"
                                :per="10"
                                tag="tbody"
                        >
                            <tr v-for="alumno in paginated('alumnos_paginados')">
                                <td v-text="alumno.id"></td>
                                <td v-text="alumno.nombre+' '+alumno.appaterno+' '+alumno.apmaterno"></td>
                                <td v-text="alumno.curp"></td>
                                <td v-text="alumno.domicilio"></td>
                                <td v-text="alumno.localidad"></td>
                                <td v-text="alumno.municipio"></td>
                                <template v-if="alumno.padretutores.length>0">
                                    <td v-for="tutor in alumno.padretutores">
                                        <a href="#"><i class="fa fa-users"><span
                                                        class="label label-success text-uppercase"
                                                        v-text="tutor.nombre+' '+tutor.appaterno+' '+tutor.apmaterno"></span></i></a>

                                    </td>
                                </template>
                                <template v-else>
                                    <a href="#"><i class="fa fa-user-times"><span
                                                    class="label label-danger text-uppercase">Sin Registrar</span></i></a>
                                </template>

                                <td>

                                    <a href="#" @click.prevent="editData(alumno)" class="btn btn-warning btn-sm"
                                       role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" role="button"><i class="fa fa-eraser"
                                                                                               aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        </paginate>

                    </table>
                    <paginate-links for="alumnos_paginados"
                                    :limit="5"
                                    :show-step-links="true"
                                    :classes="{'ul': 'pagination'}"
                                    :step-links="{next: 'Siguiente', prev: 'Anterior'}">

                    </paginate-links>
                </div>
            </div>
        </div>
        @include('escuela.alumno.modalEdit')
    </div>

@stop

@push('js')
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-paginate/3.6.0/vue-paginate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"></script-->
        <script src="{{asset('js/alumno/listarRegistrados.js')}}"></script>
@endpush