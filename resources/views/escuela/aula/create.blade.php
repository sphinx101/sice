@extends('adminlte::page')

@section('title','Asignar Aula')

@section('content_header')
    <h1>Asignar Aulas</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li><i class="fa fa-user-circle"></i> Docente</li>
        <li><a href="{{route('aula.index')}}"><i class="fa fa-list-ol"></i> Aulas Asignadas</a></li>
        <li class="active">Asignar Aula</li>
    </ol>
@stop
@section('content')

@stop


