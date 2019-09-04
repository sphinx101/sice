<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalAlumnoDelete">
    <div class="modal-dialog" role="document">
        <div class="box box-solid box-default">
            <div class="modal-header box-header with-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalAlumnoDelete">Eliminar Registro </h4>
            </div>
            <div class="modal-body box-body">
                @include('escuela.alumno.widgetAlumnoDelete')
            </div>
            <div class="modal-footer box-footer">
                <button @click.prevent="deleteData" class="btn btn-primary" type="button">Eliminar</button>
                {!! csrf_field() !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>