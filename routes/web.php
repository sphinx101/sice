<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','WelcomeController@index');

Auth::routes();



Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    //Route::get('/perfil','PerfilController@index')->name('perfil');

    Route::group(['prefix'=>'escuela/personal/docentes', 'namespace'=>'Escuela'],function(){

        Route::get('listarDocentes', 'DocenteController@ObtenerDocentes');//solicitud ajax via vue-resource para obtener los docentes
        Route::get('xct/listarDocentes', 'DocenteController@ObtenerDocentesPorEscuela');
         //Route::get('buscarDocente','DocenteController@findDocenteCurp');
    });

    Route::group(['prefix'=>'escuela/personal','namespace'=>'Escuela'],function(){

        Route::resource('perfil','PerfilController',['only'=>['index','store','show','edit','update']]);


        Route::group(['middleware'=>['role:supervisor|director']],function(){
            Route::resource('docentes','DocenteController',['except'=>['edit']]);

        });
        Route::group(['middleware'=>['role:supervisor']],function(){
            Route::get('docentes/create','DocenteController@create')->name('docentes.create');
            Route::post('docentes','DocenteController@store')->name('docentes.store');
            Route::delete('docentes/{docente}','DocenteController@destroy')->name('docentes.destroy');
            Route::get('docentes/xct/docentesporescuela','DocenteController@viewDocentesPorEscuela')->name('docentes.xct.listar');


        });

    });
    Route::group(['prefix'=>'escuela','namespace'=>'Escuela'],function(){
         Route::group(['middleware'=>['role:director|docente']],function(){
             Route::resource('alumnos', 'AlumnoController', ['except' => ['edit','show']]);
         });
         Route::group(['middleware'=>['role:director']],function(){
             Route::get('alumnos/create','AlumnoController@create')->name('alumnos.create');
             Route::post('alumnos','AlumnoController@store')->name('alumnos.store');
             //Route::get('alumnos/{alumno}/edit','AlumnoController@edit')->name('alumnos.edit');
             //Route::patch('alumnos/{alumno}','AlumnoController@update')->name('alumnos.update');
         });
    });
    Route::group(['prefix'=>'escuela/ajax/alumnos','namespace' => 'Escuela'],function(){
        Route::get('alumnosregistrados','AlumnoController@ObtenerAlumnosRegistrados');
    });

    Route::group(['prefix'=>'escuela','namespace'=>'Escuela'],function(){
         Route::group(['middleware'=>['role:director']],function(){
              Route::get('ajax/aula/asignadas','AulaController@obtenerAulasAsignadas')->name('aula.asignadas');
              Route::resource('aula','AulaController');
         });
    });

});