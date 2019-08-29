<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalAlumnoEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="box box-solid box-default">
                <div class="modal-header box-header with-border">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalAlumnoEdit">Editar Registro</h4>
                </div>
                <div class="modal-body box-body">
                    @include('escuela.alumno.widgetAlumnoEdit')
                </div>
                <div class="modal-footer box-footer">
                    <button @click.prevent="updateData" class="btn btn-primary" type="button">Actualizar</button>
                    {!! csrf_field() !!}
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>