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

Route::get('/','RelatoriosController@index')
->name('listar_relatorio');


//PRODUTOS

Route::get('/produtos', 'ProdutosController@index')
    ->name('listar_produtos');

Route::get('/produtos/criar', 'ProdutosController@create')
    ->name('form_criar_produto');
Route::post('/produtos/criar', 'ProdutosController@store');  //salvar dados do formulario no banco
Route::post('/produtos/remover/{id}', 'ProdutosController@destroy')
    ->name('remover_produto');

Route::get('/produtos/editar/{id}', 'ProdutosController@edit')
    ->name('editar_produto');

Route::post('/produtos/altera/{id}', 'ProdutosController@update')
    ->name('update_produto');

// USUÁRIOS


Route::get('/usuarios', 'UsuariosController@index')
    ->name('listar_usuarios');
Route::get('/usuarios/criar', 'UsuariosController@create')
    ->name('form_criar_usuarios');
Route::post('/usuarios/criar', 'UsuariosController@store');

Route::post('/usuarios/remover/{id}', 'UsuariosController@destroy')
    ->name('remover_usuario');;

Route::get('/usuarios/editar/{id}', 'UsuariosController@edit')
    ->name('editar_usuarios');

Route::post('/usuarios/altera/{id}', 'UsuariosController@update')
    ->name('update_usuarios');


// VENDAS

Route::get('/vendas', 'VendasController@index')
    ->name('listar_vendas');
Route::get('/vendas/criar', 'VendasController@create')
    ->name('form_criar_vendas');

Route::post('/vendas/criar', 'VendasController@store')
    ->name('criar_venda');


// RELATÓRIOS
Route::get('/relatorios', 'RelatoriosController@index')
->name('listar_relatorio');


Route::get('/relatoriosPDF', function(){
    $pdf = PDF::loadView('relatorios.indexPDF');
    return $pdf->download('relatorio.pdf');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
