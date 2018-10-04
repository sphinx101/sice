/**
 * Created by Neo on 21/07/2018.
 */

var lista_docente=new Vue({
    el: '#lista_docente',
    created: function(){
          this.getDocentes();
          toastr.options.progressBar = true;
    },
    data:{
        docentes:[],                   //Array de docentes
        pagination:{                   //Paginacion
                'total': 0,
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'from': 0,
                'to': 0
        },
        offset: 3,                     //Paginacion
        curp:'',                       //Busqueda
        docente:'',                    //docente seleccionado

        type_docente:'',               //La funcion que realiza el docente (director,docente)
        centrotrabajo_docente:'',      //centro de trabajo al que pertenece docente seleccionado

        fillDocente:{                  //Datos a editar del docenten
            'rfc':'',
            'curp':'',
            'nombre':'',
            'appaterno':'',
            'apmaterno':'',
            'domicilio':'',
            'localidad':'',
            'municipio':'',
            'telefono':'',
            'celular':'',
            'email':'',

        }

    },
    computed:{
            isActived: function () {
                return this.pagination.current_page;
            },
            pagesNumber: function () {
                   if(!this.pagination.to){
                       return [];
                   }

                   var from = this.pagination.current_page - this.offset;
                   if(from < 1){
                       from=this.pagination.current_page;
                   }

                   var to=from + (this.offset*2);
                   if(to>=this.pagination.last_page){
                       to=this.pagination.last_page;
                   }

                   pagesArray=[];
                   while(from <= to){
                       pagesArray.push(from);
                       from++;
                   }
                   return pagesArray;
            },

    },
    methods:{
        getDocentes:function(page){

            this.$http.get('docentes/listarDocentes?page='+page+'&curp='+this.curp).then(function(response){

                this.docentes=response.data.docentes.data;
                this.pagination=response.data.pagination;
            });


        },
        changePage:function (page) {
            this.pagination.current_page=page;
            this.getDocentes(page);
        },
        resetBusqueda:function(){
            this.curp='';
            this.pagination.current_page=0;
            this.pagination.total= 0;
            this.pagination.current_page=0;
            this.pagination.per_page=0;
            this.pagination.last_page=0;
            this.pagination.from=0;
            this.pagination.to=0;
            this.getDocentes();
        },
        questionDelete:function(docente){
            this.docente=docente;
            this.type_docente=docente.user.type;
            this.centrotrabajo_docente=docente.centrotrabajo.nombre;

            $('#modalDelete').modal('show');

        },
        editData: function (docente) {
            this.docente=docente;
            this.fillDocente.rfc=docente.rfc;
            this.fillDocente.curp=docente.curp;
            this.fillDocente.nombre=docente.nombre;
            this.fillDocente.appaterno=docente.appaterno;
            this.fillDocente.apmaterno=docente.apmaterno;
            this.fillDocente.domicilio=docente.domicilio;
            this.fillDocente.localidad=docente.localidad;
            this.fillDocente.municipio=docente.municipio;
            this.fillDocente.telefono=docente.telefono;
            this.fillDocente.celular=docente.celular;
            this.fillDocente.email=docente.user.email;
            this.type_docente=docente.user.type;
            this.centrotrabajo_docente=docente.centrotrabajo.nombre;


            $('#modalEdit').modal('show');
        },
        deleteData: function () {
            $('#modalDelete').modal('hide');

             this.$http.delete('docentes/'+this.docente.id,{
                 headers: {
                     'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                 },
                 responseType:'json'
             }).then(function(response){
                // console.log(response);
                 this.getDocentes();
                 toastr.success(response.body.mensaje, 'Aviso')

             }).catch(function(error){
                 console.log('Error: '+error.body.mensaje);
                 toastr.error(error.body.mensaje,'Error');
             });




        },
        updateData: function () {
            this.$http({
                'url':'docentes/'+this.docente.id,
                'method':'patch',
                'responseType':'json',
                'headers':{
                    'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                },
                'params':this.fillDocente
            }).then(function(response){
                 console.log(response);
                 if(response.body.info.statusUpdate){
                     this.getDocentes();
                     this.docente='';
                     this.fillDocente={
                         'rfc':'',
                         'curp':'',
                         'nombre':'',
                         'appaterno':'',
                         'apmaterno':'',
                         'domicilio':'',
                         'localidad':'',
                         'municipio':'',
                         'telefono':'',
                         'celular':'',
                         'email':'',

                     };
                     this.centrotrabajo_docente='';
                     this.type_docente='';
                     $('#modalEdit').modal('hide');
                     toastr.success(response.body.info.message);
                 }else{
                     toastr.info(response.body.info.message);
                 }


            }).catch(function(error) {
                console.log(error);
                if(error.body.http_code==422){
                    console.log(error.body.errors.description);
                    toastr.error('['+error.body.errors.type_error[1]+']'+error.body.errors.type_error[2],'Codigo Error['+error.body.errors.code_error+']');
                }
            })


        }



    }


});
