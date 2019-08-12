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
                        <form action="#" method="GET" accept-charset="UTF-8" role="form" class="form-inline text-right">

                            <label for="lblcurp" class="sr-only">CURP</label>
                            <input class="form-control" id="lblcurp" placeholder="CURP Alumno" name="curp" type="text">
                            {{--<input class="btn btn-primary" type="submit" value="Buscar">--}}
                            <button class="btn btn-primary" type="submit">Busqueda</button>
                            <a href="#" class="btn btn-default" role="button">Mostrar Todos</a>
                        </form>
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
                        <th width="140px">Acciones</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Santiago Victor Morfin</td>
                            <td>VIAR780210HMNCRY09</td>
                            <td>Camino Covarrubias, 680, Entre suelo 9º, 17090, Olivo de las Torres</td>
                            <td>Sahuayo</td>
                            <td>Sahuayo</td>
                            <td><a href="#"><i class="fa fa-users"><span class="label label-success">Maria de los Angeles</span></i></a>
                            </td>
                            <td>

                                <a href="#" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="#" class="btn btn-danger btn-sm" role="button"><i class="fa fa-eraser" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Romina Victor Morfin</td>
                            <td>VIMR780210HMNCRY09</td>
                            <td>Camino Covarrubias, 680, Entre suelo 9º, 17090, Olivo de las Torres</td>
                            <td>Jiquilpan</td>
                            <td>Jiquilpan</td>
                            <td><a href="#"><i class=" fa fa-users"><span
                                                class="label label-success">Reynaldo</span></i></a></td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm" role="button"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="#" class="btn btn-danger btn-sm" role="button"><i class="fa fa-eraser"
                                                                                           aria-hidden="true"></i></a>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@push('js')
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-paginate/3.6.0/vue-paginate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
        <script src="{{asset('js/alumno/listarRegistrados.js')}}"></script>
@endpush