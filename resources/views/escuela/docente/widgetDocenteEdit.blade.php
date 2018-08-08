<div class="col-md-5">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-purple-gradient">
            <h3 v-text="docente.nombre+' '+docente.appaterno+' '+docente.apmaterno" class="widget-user-username"></h3>
            <h5 v-text="type_docente" class="widget-user-desc text-capitalize"></h5>
            <h5 v-text="centrotrabajo_docente" class="widget-user-desc  text-capitalize"></h5>
        </div>
        <div class="widget-user-image">
            <img class="img-circle" src="{{asset('images/profile/viar78.jpg')}}" alt="User Avatar">
        </div>
        <div class="box-footer">
            <ul class="nav nav-stacked">
                <li><span class="label label-primary"><i class="fa fa-address-card-o margin-r-5" aria-hidden="true"></i>RFC</span><input v-model="fillDocente.rfc" class="form-control" name="rfc" type="text"></li>
                <li><span class="label label-primary"><i class="fa fa-address-card-o margin-r-5" aria-hidden="true"></i>CURP</span><input v-model="fillDocente.curp" class="form-control" name="curp" type="text"></li>
                <li><span class="label label-primary"><i class="fa fa-address-card-o margin-r-5" aria-hidden="true"></i>Nombre</span><input v-model="fillDocente.nombre" class="form-control" name="nombre" type="text"></li>
                <li><span class="label label-primary"><i class="fa fa-address-card-o margin-r-5" aria-hidden="true"></i>Ap. Paterno</span><input v-model="fillDocente.appaterno" class="form-control" name="appaterno" type="text"></li>
                <li><span class="label label-primary"><i class="fa fa-address-card-o margin-r-5" aria-hidden="true"></i>Ap. Materno</span><input v-model="fillDocente.apmaterno" class="form-control" name="apmaterno" type="text"></li>
            </ul>
        </div>
    </div>
    <!-- /.widget-user -->

</div>
<div class="col-md-7">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Informacion adicional</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <span class="label label-success"><i class="fa fa-map-marker margin-r-5"></i> Dom. Particular</span>

            <input v-model="fillDocente.domicilio" class="form-control" name="domicilio" type="text">


            <span class="label label-success"><i class="fa fa-map-marker margin-r-5"></i> Localidad</span>

            <input v-model="fillDocente.localidad" class="form-control" name="localidad" type="text">



            <span class="label label-success"><i class="fa fa-map-marker margin-r-5"></i> Municipio</span>

            <input v-model="fillDocente.municipio" class="form-control" name="municipio" type="text">



            <span class="label label-success"><i class="fa fa-envelope-o margin-r-5"></i> Correo Electronico</span>

            <input v-model="fillDocente.email" class="form-control" name="email" type="text">


            <span class="label label-success"><i class="fa fa-envelope-o margin-r-5"></i> Telefono </span>

            <input v-model="fillDocente.telefono" class="form-control" name="telefono" type="text">



            <span class="label label-success"><i class="fa fa-envelope-o margin-r-5"></i> Celular </span>

            <input v-model="fillDocente.celular" class="form-control" name="celular" type="text">




        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>