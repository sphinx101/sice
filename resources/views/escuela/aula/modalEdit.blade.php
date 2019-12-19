<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalAulaEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="box box-solid box-default">
                <div class="modal-header box-header with-border">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalAulaEdit">Cambiar Docente de la Aula</h4>
                </div>
                <div class="modal-body box-body">
                    @include('escuela.aula.widgetAulaEdit')
                </div>
                <div class="modal-footer box-footer">
                    <button class="btn btn-primary" type="button">Actualizar</button>
                    {!! csrf_field() !!}
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>