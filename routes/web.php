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

// Rota inicial, direciona pra tela de login
Route::get('/', function () {
    return view('login');
});

// Rotas referentes ao controlador de usuários 'UsuarioController', 
// o primeiro parâmetro recebe a extensão que será
// digitada na barra e o segundo redireciona pra função
// dentro do controlador. 
Route::get('/registrar', 'UsuarioController@registrar');
Route::get('/sair', 'UsuarioController@LogingOut');
Route::post('/guardarRegistro', 'UsuarioController@GuardarRegistro');
Route::post('/confereLogin', 'UsuarioController@ConfereLogin');

// Rotas referentes ao controlador de obras
Route::get('/adicionarObra', 'ObrasController@adicionarObra');
Route::get('/Home', 'ObrasController@home');
Route::get('/pesquisar', 'ObrasController@buscarObras');
Route::post('/salvarObra', 'ObrasController@salvarObra');
