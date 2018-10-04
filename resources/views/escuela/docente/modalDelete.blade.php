

    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="box box-solid box-default">
                    <div class="modal-header box-header with-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Eliminar Registro </h4>
                    </div>
                    <div class="modal-body box-body">
                         <!--label for="" id="lblPregunta" class="text-blue">Pregunta</label-->
                         @include('escuela.docente.widgetDocenteDelete')
                    </div>
                    <div class="modal-footer box-footer">
                        <!--button type="submit" class="btn btn-primary">Eliminar</button-->
                        <input @click.prevent="deleteData" class="btn btn-primary" type="button" value="Eliminar">
                        {!! csrf_field() !!}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

