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

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('categorias', 'CategoriaController');

Auth::routes();

Route::get('categorias', 'CategoriaController@index');
Route::get('categorias/novo', 'CategoriaController@create');
Route::post('categorias/store', 'CategoriaController@store');
Route::get('categorias/editar/{id}', 'CategoriaController@edit');
Route::post('categorias/update/{id}', 'CategoriaController@update');
Route::get('categorias/delete/{id}', 'CategoriaController@destroy');
Route::get('/home', 'HomeController@index')->name('home');
