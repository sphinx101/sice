@extends('adminlte::page')

@section('title','Perfil Alumno')

@section('content_header')

    <h1>Perfil de Alumno</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li class="active">Perfil Alumno</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-purple-gradient">
                    <h3 class="widget-user-username">{{ucwords(Auth::user()->alumno->nombre_completo)}}</h3>
                    <h5 class="widget-user-desc">{{ucwords(Auth::user()->type)}}</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="{{asset('images/profile/viar78.jpg')}}" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <ul class="nav nav-stacked">
                        <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
                        <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                        <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                        <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
    </div>
@endsection