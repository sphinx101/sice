@extends('adminlte::page')

@section('title','Registro Perfil')

@section('content_header')
     <h1>Registro de Informacion Personal del Docente</h1>
     <ol class="breadcrumb">
         <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Principal</a></li>
         <li class="active">Registrar Informacion Docente</li>
     </ol>
@stop

@section('content')

    <div class="row">
       @include('escuela.partial.box-rfc-curp')
       @include('escuela.partial.box-datos-adicionales-docente')
    </div>
    <!--  ./Row  -->

@stop

@push('js')

@endpush