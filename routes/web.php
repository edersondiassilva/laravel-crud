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

Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clients', 'ClientController@index');
Route::get('/clients/create', 'ClientController@create');
Route::post('/clients/store', 'ClientController@store');
Route::get('/clients/edit/{id}','ClientController@edit')->where('id', '[0-9]+');
Route::post('/clients/update', 'ClientController@update');
Route::get('/clients/delete/{id}','ClientController@destroy')->where('id', '[0-9]+');

Route::get('/documents', 'DocumentController@index');
Route::get('/documents/create', 'DocumentController@create');
Route::post('/documents/store', 'DocumentController@store');
Route::get('/documents/edit/{id}','DocumentController@edit')->where('id', '[0-9]+');
Route::post('/documents/update', 'DocumentController@update');
Route::get('/documents/delete/{id}','DocumentController@destroy')->where('id', '[0-9]+');