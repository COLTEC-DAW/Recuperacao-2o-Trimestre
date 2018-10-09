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

Route::resource('obras', 'ObrasController');

Auth::routes();

Route::post('/cadastrarlivro', 'ObrasController@NovoCadastro');

Route::get('/cadastrar', 'ObrasController@cadastrarObra');

Route::get('/adicionarObra', 'ObrasController@adicionarObra');
Route::get('/home', 'ObrasController@ListaLivro')->name('home');
Route::get('/', 'ObrasController@ListaLivro')->name('home');