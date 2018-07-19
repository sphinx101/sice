@extends('adminlte::page')

@section('title','Alumnos Registrados')

@section('content_header')

    <h1>Alumnos Registrados</h1>
@stop

@section('content')
    @include('flash::message')

@stop

@push('js')

@endpush