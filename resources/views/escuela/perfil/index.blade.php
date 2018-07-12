@extends('adminlte::page')

@section('title','Perfil Usuario')

@section('content_header')

   <h1>Perfil de Usuario</h1>
@stop

@section('content')
    @include('flash::message')

    <p>Informacion de Usuario y Mensajes para el  usuario</p>
@stop

@push('js')
     <script> console.log('Hi!'); </script>
@endpush