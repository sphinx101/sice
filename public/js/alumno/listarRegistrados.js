/**
 * Created by sphinx on 10/08/2019.
 */



var lista_alumno=new Vue({
     el:'#main_alumnos',
     created: function () {
         this.ObtenerAlumnos();
         toastr.options.progressBar = true;
     },
     data: {
         alumnos:[],
         alumno: '',
         busqueda_curp: '',
         fillAlumno: {
             'curp': '',
             'nombre': '',
             'appaterno': '',
             'apmaterno': '',
             'domicilio': '',
             'localidad': '',
             'municipio': ''
         },
         paginate: ['alumnos_paginados']

     },
    computed: {
        busquedaCurp: function () {
            //return  this.alumnos.filter((alumno) => alumno.curp.indexOf(this.busqueda_curp) > -1);
            return this.alumnos.filter(function (alumno) {
                //return alumno.curp.indexOf(this.busqueda_curp)>-1;
                return alumno.curp.includes(this.busqueda_curp);
            }, this);

        }
    },

    methods: {
        ObtenerAlumnos: function () {
            vu = this;
            axios
                .get('ajax/alumnos/alumnosregistrados', {
                    responseType: 'json'
                })
                .then(function (response) {

                    vu.alumnos = response.data;
                    console.log(vu.alumnos);
                });
            /* this.$http.get('ajax/alumnos/alumnosregistrados')
             .then(function(response){
             console.log(response.body);
             this.alumnos=response.body;

             });*/

        },
        editData: function (alumno) {

            this.alumno = alumno;

            this.fillAlumno.curp = alumno.curp;
            this.fillAlumno.nombre = alumno.nombre;
            this.fillAlumno.appaterno = alumno.appaterno;
            this.fillAlumno.apmaterno = alumno.apmaterno;
            this.fillAlumno.domicilio = alumno.domicilio;
            this.fillAlumno.localidad = alumno.localidad;
            this.fillAlumno.municipio = alumno.municipio;

            $('#modalEdit').modal('show');
        },
        updateData: function () {
            vu = this;
            axios({
                url: 'alumnos/' + vu.alumno.id,
                method: 'patch',
                responseType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                },
                params: vu.fillAlumno
            }).then(function (response) {

                if (response.data.info.statusUpdate) {
                    vu.ObtenerAlumnos();
                    vu.alumno = '';
                    vu.fillAlumno = {
                        'curp': '',
                        'nombre': '',
                        'appaterno': '',
                        'apmaterno': '',
                        'domicilio': '',
                        'localidad': '',
                        'municipio': ''

                    };
                    $('#modalEdit').modal('hide');
                    toastr.success(response.data.info.message);

                } else {
                    toastr.info(response.data.info.message);
                }
            }).catch(function (e) {

                error = e.response.data;
                if (error.http_code == 422) {
                    toastr.error('[' + error.errors.type_error[1] + ']' + error.errors.type_error[2], 'Codigo Error[' + error.errors.code_error + ']');
                }

            })
        },
        questionDelete: function (alumno) {
            this.alumno = alumno;
            $('#modalDelete').modal('show');
        },
        deleteData: function () {
            vu = this;
            $('#modalDelete').modal('hide');
            axios({
                url: 'alumnos/' + vu.alumno.id,
                method: 'delete',
                responseType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                }
            }).then(function (response) {

                toastr.success(response.data.info.message);
                vu.ObtenerAlumnos();

            }).catch(function(e){
                error = e.response.data;
                if (error.http_code == 422) {
                    toastr.error('[' + error.errors.type_error[1] + ']' + error.errors.type_error[2], 'Codigo Error[' + error.errors.code_error + ']');
                }
            })

        }

     }




});

