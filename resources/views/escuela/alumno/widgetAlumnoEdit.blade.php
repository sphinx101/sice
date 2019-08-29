<div class="col-md-5">
    <div class="box box-widget widget-user">
        <div class="widget-user-header bg-purple-gradient">
            <h3 v-text="alumno.nombre+' '+alumno.appaterno+' '+alumno.apmaterno" class="widget-user-username"></h3>
            {{--<h5 class="widget-user-desc text-capitalize">Alumno</h5>--}}

        </div>
        <div class="widget-user-image">
            <img class="img-circle" src="{{asset('images/profile/viar78.jpg')}}" alt="User Avatar">
        </div>
        <div class="box-footer">
            <ul class="nav nav-stacked">

                <li><span class="label label-primary"><i class="fa fa-address-card-o margin-r-5" aria-hidden="true"></i>CURP</span><input
                            v-model="fillAlumno.curp" class="form-control" name="curp" type="text"></li>
                <li><span class="label label-primary"><i class="fa fa-address-card-o margin-r-5" aria-hidden="true"></i>Nombre</span><input
                            v-model="fillAlumno.nombre" class="form-control" name="nombre" type="text"></li>
                <li><span class="label label-primary"><i class="fa fa-address-card-o margin-r-5" aria-hidden="true"></i>Ap. Paterno</span><input
                            v-model="fillAlumno.appaterno" class="form-control" name="appaterno" type="text"></li>
                <li><span class="label label-primary"><i class="fa fa-address-card-o margin-r-5" aria-hidden="true"></i>Ap. Materno</span><input
                            v-model="fillAlumno.apmaterno" class="form-control" name="apmaterno" type="text"></li>
            </ul>
        </div>
    </div>
</div>
<div class="col-md-7">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Informacion adicional</h3>
        </div>
        <div class="box-body">
            <span class="label label-success"><i class="fa fa-map-marker margin-r-5"></i> Dom. Particular</span>

            <input v-model="fillAlumno.domicilio" class="form-control" name="domicilio" type="text">


            <span class="label label-success"><i class="fa fa-map-marker margin-r-5"></i> Localidad</span>

            <input v-model="fillAlumno.localidad" class="form-control" name="localidad" type="text">


            <span class="label label-success"><i class="fa fa-map-marker margin-r-5"></i> Municipio</span>

            <input v-model="fillAlumno.municipio" class="form-control" name="municipio" type="text">


        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>