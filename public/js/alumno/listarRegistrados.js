/**
 * Created by sphinx on 10/08/2019.
 */
Vue.use('vue-paginate');

var lista_alumno=new Vue({
     el:'#main_alumnos',
     created: function () {
         axios.get('ajax/alumnos/alumnosregistrados')
             .then(function (response) {
                 this.alumnos=response.data;
                 console.log(this.alumnos);
             })
     },
     data: {
          alumnos:[],

     }




});

