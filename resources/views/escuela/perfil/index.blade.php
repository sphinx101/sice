@extends('adminlte::page')

@section('title','Perfil Usuario')

@section('content_header')

   <h1>Perfil de Usuario</h1>
   <ol class="breadcrumb">
       <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li class="active">Perfil Usuario</li>
   </ol>
@stop

@section('content')
    @include('flash::message')

    <div class="row">
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-purple-gradient">
                    <h3 class="widget-user-username">{{ucwords(Auth::user()->docente->nombre_completo)}}</h3>
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
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Acerca de mi...</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i>Centro de Trabajo</strong>

                    <p class="text-muted">
                        Escuela Telesecundaria <strong>{{Auth::user()->docente->centrotrabajo->nombre}}</strong>
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Dom. Particular</strong>

                    <p class="text-muted">{{Auth::user()->docente->domicilio.', '.Auth::user()->docente->ubicacion_completa}}</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Habilidades</strong>

                    <p>
                        <span class="label label-danger">UI Design</span>
                        <span class="label label-success">Coding</span>
                        <span class="label label-info">Javascript</span>
                        <span class="label label-warning">PHP</span>
                        <span class="label label-primary">Node.js</span>
                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </div>
@stop

@push('js')
     <script> console.log('Hi!'); </script>
@endpush