<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);
Route::get('/logout', 'Auth\LoginController@logout');
Route::group([ 'middleware' => 'auth'], function()
{

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/clientes', 'ClienteController@index')->name('clientes');
    Route::get('/cliente/{id}', 'ClienteController@cliente')->name('cliente');
    Route::get('formulario/cliente/cadastrar/editar/{id?}', 'ClienteController@formularioCadastrarEditar')->name('formulario_cliente_cadastrar_editar');
    Route::post('cadastrar/cliente','ClienteController@cadastrarCliente')->name('cadastrar_cliente');
    Route::post('editar/cliente','ClienteController@editarCliente')->name('editar_cliente');
    Route::post('remover/cliente','ClienteController@removerCliente')->name('remover_cliente');


    Route::get('/usuarios', 'UsuarioController@index')->name('usuarios');
    Route::get('formulario/usuario/cadastrar/editar/{id?}', 'UsuarioController@formularioCadastrarEditar')->name('formulario_usuario_cadastrar_editar');
    Route::post('cadastrar/usuario','UsuarioController@cadastrarUsuario')->name('cadastrar_usuario');
    Route::post('editar/usuario','UsuarioController@editarUsuario')->name('editar_usuario');
    Route::post('remover/usuario','UsuarioController@removerUsuario')->name('remover_usuario');



});