@extends('adminlte::page')

@push('css')
   <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"-->
@endpush

@section('title','Datos Generales')

@section('content_header')

    <h1>Datos Generales</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li class="active">Datos Generales</li>
    </ol>
@stop

@section('content')

    <div class="row" id="lista_docente">
        <div class="box box-solid box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Docentes Registrados </h3>
                <div class="box-tools ">
                    <div class="form-group">
                        <form @submit.prevent="getDocentes" method="GET" accept-charset="UTF-8" role="form" class="form-inline text-right" >

                            <label for="lblcurp" class="sr-only">CURP</label>
                            <input v-model="curp" class="form-control" id="lblcurp" placeholder="CURP Docente" name="curp" type="text">
                            <input class="btn btn-primary" type="submit" value="Buscar">
                            <a @click.prevent="resetBusqueda" class="btn btn-default" role="button">Mostrar Todos</a>
                        </form>
                     </div>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                       <table class="table table-hover table-sprite">
                           <thead>
                               <th>Id</th>
                               <th>Nombre</th>
                               <th>RFC</th>
                               <th>CURP</th>
                               <th># Celular</th>
                               <th># Tel. Part.</th>
                               <th width="200px"></th>
                           </thead>
                           <tbody>
                           <tr v-for="docente in docentes">
                               <td v-text="docente.id"></td>
                               <td v-text="docente.nombre+' '+docente.appaterno+' '+docente.apmaterno"></td>
                               <td v-text="docente.rfc"></td>
                               <td v-text="docente.curp"></td>
                               <td v-text="docente.celular"></td>
                               <td v-text="docente.telefono"></td>
                               <td width="60px">
                                   <a :href="'docentes/'+docente.id" class="btn btn-success btn-sm" role="button"><i
                                               class="fa fa-eye" aria-hidden="true"></i></a>
                                   <a href="#" @click.prevent="editData(docente)" class="btn btn-warning btn-sm"
                                      role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                   <a v-if="docente.user.type==='supervisor'" href="#"
                                      @click.prevent="questionDelete(docente)" class="btn btn-danger btn-sm"
                                      role="button"><i class="fa fa-eraser" aria-hidden="true"></i></a>

                               </td>
                           </tr>
                           </tbody>
                       </table>
                       <nav>
                          <ul class="pagination">
                              <li v-if="pagination.current_page > 1">
                                  <a href="#" @click.prevent="changePage(pagination.current_page - 1)" >
                                      <span>Atras</span>
                                  </a>
                              </li>
                              <li v-for="page in pagesNumber" :class="[ page == isActived ? 'active' : '' ]">
                                  <a href="#" @click.prevent="changePage(page)">
                                      @{{ page }}
                                  </a>
                              </li>
                              <li v-if="pagination.current_page < pagination.last_page">
                                  <a href="#" @click.prevent="changePage(pagination.current_page + 1)">
                                      <span>Siguiente</span>
                                  </a>
                              </li>

                          </ul>
                       </nav>
                </div>
            </div>
        </div>
        @include('escuela.docente.modalDelete')
        @include('escuela.docente.modalEdit')
    </div>

    <!--div id="lista_docente">
        <pre>


        </pre>

    </div-->

@stop

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"></script>
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" ></script-->

    <script src="{{asset('js/docente/listar.js')}}"></script>
@endpush