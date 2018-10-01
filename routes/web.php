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
    //$title = 'Entrar';
    return view('login');
});

Route::get('/registrar', 'UsuarioController@registrar');
Route::post('/guardarRegistro', 'UsuarioController@GuardarRegistro');
Route::post('/confereLogin', 'UsuarioController@ConfereLogin');

Route::get('/sair', 'UsuarioController@LogingOut');
Route::get('/adicionarObra', 'ObrasController@adicionarObra');
Route::post('/salvarObra', 'ObrasController@salvarObra');    

Route::get('/Home', 'ObrasController@home');
Route::post('/pesquisar', 'ObrasController@buscarObras');
