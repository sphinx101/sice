@extends('adminlte::page')

@section('title','Docente por Escuela')

@section('content_header')

    <h1>Docentes por Escuela</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li class="active">Docentes por Escuela</li>
    </ol>
@stop

@section('content')
    <div class="row" id="docentesescuela">
        <div class="box box-solid box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Docentes Registrados por Centro de Trabajo</h3>
                <!--div class="box-tools">
                    <div class="form-group">

                    </div>
                </div-->
            </div>
            <div class="box-body">
                <template v-for="escuela in escuelas">
                    <div class="col-md-6">
                        <div class="box box-solid box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title" v-text="escuela[0].ct_nom"></h3>

                            </div>

                            <div class="box-body">

                                <div class="table-responsive">
                                    <table class="table table-hover table-sprite">
                                        <tbody>
                                        <tr v-for="docente in escuela">
                                            <td v-text="docente.docente_id"></td>
                                            <td><a :href="'../'+docente.docente_id"><span
                                                            v-text="docente.docente"></span></a></td>
                                            <td v-text="docente.domicilio"></td>
                                            <td v-text="docente.municipio"></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

            </div>
        </div>
    </div>
@stop

@push('js')
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"></script>

<script src="{{asset('js/docente/listarPorCT.js')}}"></script>
@endpush