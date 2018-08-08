<div class="col-md-12">
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

    </div>
    <!-- /.widget-user -->

</div>