<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiceTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
          Schema::create('centrotrabajos',function(Blueprint $table){
              $table->increments('id');
              $table->string('cct')->unique();
              $table->string('nombre');

              $table->timestamps();
              $table->softDeletes();
          });
          Schema::create('docentes',function(Blueprint $table){
             $table->increments('id');
             $table->integer('centrotrabajo_id')->unsigned();
             $table->foreign('centrotrabajo_id')->references('id')->on('centrotrabajos')->onDelete('cascade')->onUpdate('cascade');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
             $table->string('rfc',13)->unique();
             $table->string('curp',18)->unique();
             $table->string('nombre');
             $table->string('appaterno');
             $table->string('apmaterno');
             $table->string('domicilio');
             $table->string('localidad');
             $table->string('municipio');
             $table->string('telefono')->nullable();
             $table->string('celular')->nullable();
             $table->boolean('actualizado')->default(false);

             $table->timestamps();
             $table->softDeletes();
          });
          Schema::create('cicloescolares',function(Blueprint $table){
             $table->increments('id');
             $table->string('nombrre',10)->unique();

             $table->timestamps();
             $table->softDeletes();
          });
          Schema::create('turnos',function(Blueprint $table){
             $table->increments('id');
             $table->string('nom_turno',20)->unique();

             $table->timestamps();
             $table->softDeletes();
          });
          Schema::create('grupos',function(Blueprint $table){
             $table->increments('id');
             $table->string('nom_grupo',3)->unique();

             $table->timestamps();
             $table->softDeletes();
          });
          Schema::create('grados',function(Blueprint $table){
             $table->increments('id');
              $table->string('nom_grado',10)->unique();
              $table->timestamps();
              $table->softDeletes();
          });
          Schema::create('alumnos',function(Blueprint $table){
              $table->increments('id');
              $table->integer('centrotrabajo_id')->unsigned();
              $table->foreign('centrotrabajo_id')->references('id')->on('centrotrabajos')->onUpdate('cascade');
              $table->integer('user_id')->unsigned();
              $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
              $table->string('curp',18)->unique();
              $table->string('nombre');
              $table->string('appaterno');
              $table->string('apmaterno');
              $table->string('domicilio');
              $table->string('localidad');
              $table->string('municipio');

              $table->timestamps();
              $table->softDeletes();
          });
          Schema::create('aulas',function(Blueprint $table){
              $table->increments('id');
              $table->integer('docente_id')->unsigned();
              $table->foreign('docente_id')->references('id')->on('docentes')->onUpdate('cascade'); //docentes-aulas
              $table->integer('turno_id')->unsigned();
              $table->foreign('turno_id')->references('id')->on('turnos')->onUpdate('cascade');//turnos-aulas
              $table->integer('grupo_id')->unsigned();
              $table->foreign('grupo_id')->references('id')->on('grupos')->onUpdate('cascade');//grupos-aulas
              $table->integer('grado_id')->unsigned();
              $table->foreign('grado_id')->references('id')->on('grados')->onUpdate('cascade');//grados-aulas
              $table->integer('cicloescolar_id')->unsigned();
              $table->foreign('cicloescolar_id')->references('id')->on('cicloescolares')->onUpdate('cascade');//cicloescolares-aulas

              $table->timestamps();
              $table->softDeletes();
          });
          Schema::create('inscripciones',function(Blueprint $table){
              $table->increments('id');
              $table->integer('alumno_id')->unsigned();
              $table->foreign('alumno_id')->references('id')->on('alumnos')->onUpdate('cascade');
              $table->integer('aula_id')->unsigned();
              $table->foreign('aula_id')->references('id')->on('aulas')->onUpdate('cascade');

              $table->timestamps();
              $table->softDeletes();
          });
          Schema::create('asistencias',function(Blueprint $table){
              $table->increments('id');
              $table->integer('alumno_id')->unsigned();
              $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade')->onUpdate('cascade');//alumnos-asistencias
              $table->date('fecha');
              $table->enum('asistio',['A','F','R']);

              $table->timestamps();
              $table->softDeletes();
          });
          Schema::create('padretutores',function(Blueprint $table){
              $table->increments('id');
              $table->string('nombre',20);
              $table->string('appaterno',20);
              $table->string('apmaterno',20);
              $table->string('telefono')->nullable();
              $table->string('celular')->nullable();
              $table->string('domicilio');
              $table->string('localidad');
              $table->string('ocupacion');
              $table->string('escolaridad');

              $table->timestamps();
              $table->softDeletes();

          });
          Schema::create('parentescos',function(Blueprint $table){
              $table->increments('id');
              $table->string('tipo');

              $table->timestamps();
              $table->softDeletes();
          });
          Schema::create('alumno_padretutor',function(Blueprint $table){
              $table->integer('alumno_id')->unsigned();
              $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade')->onUpdate('cascade');
              $table->integer('padretutor_id')->unsigned();
              $table->foreign('padretutor_id')->references('id')->on('padretutores')->onDelete('cascade')->onUpdate('cascade');
              $table->integer('parentesco_id')->unsigned();
              $table->foreign('parentesco_id')->references('id')->on('parentescos')->onDelete('cascade')->onUpdate('cascade');

              $table->timestamps();
              $table->softDeletes();

          });
          Schema::create('materias',function(Blueprint $table){
              $table->increments('id');
              $table->string('nom_materia',20);

              $table->timestamps();
              $table->softDeletes();
          });
          Schema::create('periodos',function(Blueprint $table){
              $table->increments('id');
              $table->string('nom_periodo',15);
              $table->date('fecha_inicio_periodo');
              $table->date('fecha_fin_periodo');

              $table->timestamps();
              $table->softDeletes();
          });
          Schema::create('niveles',function(Blueprint $table){
              $table->increments('id');
              $table->string('nom_nivel',10);
              $table->string('escala',5);

              $table->timestamps();
              $table->softDeletes();
          });
          Schema::create('calificaciones',function(Blueprint $table){
              $table->increments('id');
              $table->integer('alumno_id')->unsigned();
              $table->foreign('alumno_id')->references('id')->on('alumnos')->onUpdate('cascade'); //alumnos-calificaciones
              $table->integer('materia_id')->unsigned();
              $table->foreign('materia_id')->references('id')->on('materias')->onUpdate('cascade'); //materias-calificaciones
              $table->integer('periodo_id')->unsigned();
              $table->foreign('periodo_id')->references('id')->on('periodos')->onUpdate('cascade'); //periodos-calificaciones
              $table->integer('niveles_id')->unsigned();
              $table->foreign('niveles_id')->references('id')->on('niveles')->onUpdate('cascade');  //niveles-calificaciones
              //$table->integer('tarea_id')->unsigned();
              //$table->foreign('tarea_id')->references('id')->on('tareas')->onUpdate('cascade'); //tareas-calificaciones
              $table->integer('cal_tarea')->unsigned();
              $table->integer('cal_participacion')->unsigned();
              $table->integer('cal_disciplina')->unsigned();
              $table->integer('cal_examen')->unsigned();

              $table->timestamps();
              $table->softDeletes();

          });
          Schema::create('tareas',function(Blueprint $table){
              $table->increments('id');
              $table->string('nom_tarea',45);
              $table->string('descripcion',200);
              $table->dateTime('fecha_inicio_tarea');
              $table->dateTime('fecha_fin_tarea');

              $table->timestamps();
              $table->softDeletes();
          });
          Schema::create('tentregadas',function(Blueprint $table){
              $table->integer('alumno_id')->unsigned();
              $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade')->onUpdate('cascade');
              $table->integer('tarea_id')->unsigned();
              $table->foreign('tarea_id')->references('id')->on('tareas')->onDelete('cascade')->onUpdate('cascade');
              $table->dateTime('fecha_entregada');
              $table->integer('calificacion');

              $table->timestamps();
              $table->softDeletes();
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('tentregadas');
        Schema::dropIfExists('tareas');
        Schema::dropIfExists('calificaciones');
        Schema::dropIfExists('materias');
        Schema::dropIfExists('periodos');
        Schema::dropIfExists('niveles');
        Schema::dropIfExists('alumno_padretutor');
        Schema::dropIfExists('parentescos');
        Schema::dropIfExists('padretutores');
        Schema::dropIfExists('asistencias');
        Schema::dropIfExists('inscripciones');
        Schema::dropIfExists('aulas');
        Schema::dropIfExists('alumnos');
        Schema::dropIfExists('grado');
        Schema::dropIfExists('grupos');
        Schema::dropIfExists('turnos');
        Schema::dropIfExists('cicloescolares');
        Schema::dropIfExists('docentes');
        Schema::dropIfExists('centrotrabajos');

    }
}
