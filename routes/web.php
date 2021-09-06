<?php

use Illuminate\Support\Facades\Route;
use App\http\Middleware\LogAcessoMiddleware;

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

Route::middleware(LogAcessoMiddleware::class)->get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobre')->name('site.sobrenos');
Route::middleware(LogAcessoMiddleware::class)->get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login', function () {
    return 'Login';
})->name('site.login');

//Agrupando rotas
Route::prefix('/app')->group(function () {
    Route::get('/clientes', function () {
        return 'Clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedor');

    Route::get('/produtos', function () {
        return 'produtos';
    })->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', 'testeController@teste')->name('teste');
Route::fallback(function () {
    echo 'a rota acessada não existe. <a href="' . route('site.index') . '">clique aqui</a> para retornar a pagina inicial';
});
