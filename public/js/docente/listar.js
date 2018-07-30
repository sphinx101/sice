/**
 * Created by Neo on 21/07/2018.
 */

var lista_docente=new Vue({
    el: '#lista_docente',
    created: function(){
          this.getDocentes();
    },
    data:{
        docentes:[],
        pagination:{
                'total': 0,
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'from': 0,
                'to': 0
        },
        offset: 3,
        curp:'',


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
        editData: function (id) {
            alert(id);
        },
        deleteData: function (docente) {
             this.$http.delete('docentes/'+docente).then(function(response){

             });
        }



    }


});
