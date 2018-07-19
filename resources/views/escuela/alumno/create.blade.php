@extends('adminlte::page')

@section('title','Registro Alumno')

@section('content_header')

    <h1>Registro Alumno</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li><a href="#">Alumno</a></li>
        <li class="active">Registrar</li>
    </ol>
@stop

@section('content')
    @include('flash::message')
    <row>
        @include('escuela.alumno.partial.box-alumno-datos-personales')
        @include('escuela.alumno.partial.box-alumnos-datos-adicionales')
     </row>
@stop

@push('js')

@endpush