@extends('adminlte::page')

@section('title','Registro Perfil')

@section('content_header')
     <h1>Registro de Informacion Personal del Docente</h1>
@stop

@section('content')

    <!--div class="row"-->
        {!! Form::open(['role'=>'form','route'=>'perfil.store']) !!}
        @include('escuela.partial.box-rfc-curp')
        @include('escuela.partial.box-datos-personales-docente')
        @include('escuela.partial.box-datos-adicionales-docente')
        <input type="hidden" name="user_id" value="{{Auth::id()}}">

        <div class="box-footer">
            <div class="form-group pull-right">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
                <a href="{{url('/home')}}" class="btn btn-default" role="button">Regresar</a>
            </div>
        </div>
    <!--/div-->
    <!--  ./Row  -->

@stop

@push('js')

@endpush