@extends('adminlte::page')

@section('title','Alta Docente')

@section('content_header')

    <h1>Registro Docente</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li class="active">Registro Docente</li>
    </ol>
@stop

@section('content')
    @include('flash::message')
    <row>
        @include('escuela.partial.box-rfc-curp')
        @include('escuela.partial.box-datos-adicionales-docente')
    </row>

@stop

@push('js')

@endpush