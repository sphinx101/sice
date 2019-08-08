/**
 * Created by sphinx on 11/10/18.
 */


var lista_docente_escuela = new Vue({
    el: '#docentesescuela',
    created: function () {
        this.getDocentes();
        toastr.options.progressBar = true;
    },
    data: {
        docentes: [],
        escuelas: []
        //iNumEscuelas: null,

    },
    methods: {
        getDocentes: function () {
            this.$http.get('listarDocentes').then(function (response) {
                console.log(response.data.escuelas);

                this.escuelas = response.data.escuelas;

                //this.iNumEscuelas = response.data.escuelas.length;
            });
        }

    }
});