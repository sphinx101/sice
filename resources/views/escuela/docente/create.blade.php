@extends('adminlte::page')

@section('title','Alta Docente')

@section('content_header')

    <h1>Registro Docente</h1>
@stop

@section('content')
    @include('flash::message')
    {!! Form::open(['role'=>'form','route'=>'docentes.store']) !!}
    @include('escuela.partial.box-rfc-curp')
    @include('escuela.partial.box-datos-personales-docente')
    @include('escuela.partial.box-datos-adicionales-docente')

    <div class="box-footer">
        <div class="form-group pull-right">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            <a href="{{url('/home')}}" class="btn btn-default" role="button">Regresar</a>
        </div>
    </div>
@stop

@push('js')

@endpush