/**
 * Created by sphinx on 16/09/2019.
 */

var lista_aulas=new Vue({
    el:'#main_aula',
    created: function () {
          this.obtenerAulas();
          toastr.options.progressBar = true;
    },
    data:{
         aulas:[],
         aula_select:'',
         docente:'',
         grado:'',
         grupo:'',
         turno:'',
         paginate: ['aulas_paginadas'],
         buscar_curp: ''
    },
    computed:{
           busquedaCurp: function () {
               return this.aulas.filter(function (aula) {
                    return aula.docente.curp.includes(this.buscar_curp);
               },this);
           }
    },
    methods:{
          obtenerAulas: function () {
              vu=this;
              axios
                  .get('ajax/aula/asignadas',{
                      responseType: 'json'
                  })
                  .then(function (response) {

                      vu.aulas=response.data;
                  });
          },
          questionDelete: function(aula){
               this.aula_select=aula;
               this.docente=aula.docente.nombre+' '+aula.docente.appaterno+' '+aula.docente.apmaterno;
               this.grado=aula.grado.nom_grado;
               this.grupo=aula.grupo.nom_grupo;
               this.turno=aula.turno.nom_turno;
               $('#modalDelete').modal('show');

          },
          deleteData: function () {
              vu=this;
              $('#modalDelete').modal('hide');
              axios({
                  url: 'aula/'+vu.aula_select.id,
                  method: 'delete',
                  responseType: 'json',
                  headers: {
                      'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                  }
              }).then(function (response) {
                  vu.obtenerAulas();
                  toastr.success(response.data.info.message);

              }).catch(function(e){
                  error = e.response.data;
                  if (error.http_code == 422) {
                      toastr.error('[' + error.errors.type_error[1] + ']' + error.errors.type_error[2], 'Codigo Error[' + error.errors.code_error + ']');
                  }else if(error.http_code==500) {
                      toastr.error('[' + error.errors.type_error[1] + ']' + error.errors.type_error[2], 'Codigo Error[' + error.errors.code_error + ']');
                  }

              })
          }
    }
    

});