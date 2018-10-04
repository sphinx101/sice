@extends('adminlte::page')

@section('title','Informacion docente')

@section('content_header')

    <h1>Informacion Docente</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li><a href="{{route('docentes.index')}}"><i class="fa fa-dashboard"></i> Datos Generales</a></li>
        <li class="active">Informacion Docente</li>
    </ol>
@stop

@section('content')
   <div class="row">
       <div class="col-md-5 col-md-offset-3">
           <!-- Widget: user widget style 1 -->
           <div class="box box-widget widget-user">
               <!-- Add the bg color to the header using any of the bg-* classes -->
               <div class="widget-user-header bg-purple-gradient">
                   <h3 class="widget-user-username">{{ucwords($docente->nombre_completo)}}</h3>
                   <h5 class="widget-user-desc">{{ucwords($docente->user->type)}}</h5>
               </div>
               <div class="widget-user-image">
                   <img class="img-circle" src="{{asset('images/profile/viar78.jpg')}}" alt="User Avatar">
               </div>
               <div class="box-body">
                   <span class="label label-primary"><i class="fa fa-book margin-r-5"></i>Centro de Trabajo</span>
                   <p class="text-muted">
                       Escuela <strong>{{$docente->centrotrabajo->nombre}}</strong>
                   </p>
                   <span class="label label-primary"><i class="fa fa-address-card-o margin-r-5"></i> RFC</span>
                   <p class="text-muted">{{$docente->rfc}}</p>
                   <span class="label label-primary"><i class="fa fa-address-card-o margin-r-5"></i> CURP</span>
                   <p class="text-muted">{{$docente->curp}}</p>
                   <span class="label label-success"><i class="fa fa-map-marker margin-r-5"></i> Dom. Particular</span>
                   <p class="text-muted">{{$docente->domicilio.', '.$docente->ubicacion_completa}}</p>
                   <span class="label label-success"><i class="fa fa-phone margin-r-5"></i> Telefono</span>
                   <p class="text-muted">{{$docente->telefono}}</p>
                   <span class="label label-success"><i class="fa fa fa-mobile margin-r-5"></i> Celular</span>
                   <p class="text-muted">{{$docente->celular}}</p>
                   <span class="label label-default"><i class="fa fa-envelope-o margin-r-5"></i> Correo electronico</span>
                   <p class="text-muted">{{$docente->user->email}}</p>
                   <span class="label label-default"><i class="fa fa-user margin-r-5"></i> Nombre Usuario</span>
                   <p class="text-muted">{{$docente->user->username}}</p>
               </div>
               <!--div class="box-footer">
                   <ul class="nav nav-stacked">
                       <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>

                   </ul>
               </div-->
           </div>
           <!-- /.widget-user -->
       </div>

   </div>
@stop

@push('js')

@endpush