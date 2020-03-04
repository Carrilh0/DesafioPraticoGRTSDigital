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
Route::get('/', 'HomeController@index')->name('home');

Route::get('/clientes', 'ClienteController@index')->name('clientes');

Route::get('/usuarios', 'UsuarioController@index')->name('usuarios');
Route::get('formulario/usuario/cadastrar/editar/{id?}', 'UsuarioController@formularioCadastrarEditar')->name('formulario_usuario_cadastrar_editar');
Route::post('cadastrar/usuario','UsuarioController@cadastrarUsuario')->name('cadastrar_usuario');


Auth::routes(['register' => false]);

Route::group([ 'middleware' => 'auth'], function()
{

    //Route::get('/', 'HomeController@index')->name('home');

});