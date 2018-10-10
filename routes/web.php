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


// Rota que passa a variável 'obras' como um resource, ou seja, um recurso que pode ser utilizado em todo o sistema
Route::resource('obras', 'ObrasController');

// Rotas definidas pelo laravel após o artisan criar o sistema de autenticação
Auth::routes();

// Rotas da página inicial
Route::get('/home', 'ObrasController@ListaLivro')->name('home'); // Home
Route::get('/', 'ObrasController@ListaLivro')->name('home'); // Home

// Rotas do cadastro de livros
Route::get('/cadastrar', 'ObrasController@cadastrarObra'); // Formulário
Route::post('/cadastrarlivro', 'ObrasController@NovoCadastro'); // Função que cadastra no sistema

// Rota da função de pesquisa!
Route::get('/pesquisa', 'ObrasController@PesquisaLivro');