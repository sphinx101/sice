@extends('adminlte::page')

@section('title','Docente por Escuela')

@section('content_header')

    <h1>Docentes por Escuela</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li class="active">Docentes por Escuela</li>
    </ol>
@stop

@section('content')
    <div class="row" id="lista_docente_x_escuela">
        <div class="box box-solid box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Docentes Registrados </h3>
                <!--div class="box-tools">
                    <div class="form-group">

                    </div>
                </div-->
            </div>
            <div class="box-body">

            </div>
        </div>
    </div>
@stop