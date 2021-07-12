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

#Dashboard
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

#Alunos
Route::get('/alunos', 'AlunosController@listar')->name('alunos');
Route::get('/alunos/listar', 'AlunosController@listar')->name('alunos');
Route::get('/alunos/criar', 'AlunosController@criar');
Route::post('/alunos/salvar', 'AlunosController@salvar');
Route::get('/alunos/editar/{id}', 'AlunosController@editar')->where('id', '[0-9]+')->name('alunos.editar');
Route::post('/alunos/atualizar/{id}', 'AlunosController@atualizar')->where('id', '[0-9]+')->name('alunos.atualizar');
Route::get('/alunos/excluir/{id}', 'AlunosController@excluir')->where('id', '[0-9]+')->name('alunos.excluir');

#Cursos
Route::get('/cursos', 'CursosController@listar')->name('cursos');
Route::get('/cursos/listar', 'CursosController@listar')->name('cursos');
Route::get('/cursos/criar', 'CursosController@criar');
Route::post('/cursos/salvar', 'CursosController@salvar');
Route::get('/cursos/editar/{id}', 'CursosController@editar')->where('id', '[0-9]+')->name('cursos.editar');
Route::post('/cursos/atualizar/{id}', 'CursosController@atualizar')->where('id', '[0-9]+')->name('cursos.atualizar');
Route::get('/cursos/excluir/{id}', 'CursosController@excluir')->where('id', '[0-9]+')->name('cursos.excluir');

#Matriculas
Route::get('/matriculas', 'MatriculasController@listar')->name('matriculas');
Route::get('/matriculas/listar', 'MatriculasController@listar')->name('matriculas');
Route::get('/matriculas/criar', 'MatriculasController@criar');
Route::post('/matriculas/salvar', 'MatriculasController@salvar');
Route::get('/matriculas/editar/{id}', 'MatriculasController@editar')->where('id', '[0-9]+')->name('matriculas.editar');
Route::post('/matriculas/atualizar/{id}', 'MatriculasController@atualizar')->where('id', '[0-9]+')->name('matriculas.atualizar');
Route::get('/matriculas/excluir/{id}', 'MatriculasController@excluir')->where('id', '[0-9]+')->name('matriculas.excluir');
Auth::routes();

