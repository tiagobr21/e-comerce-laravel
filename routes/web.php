<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [ProdutoController::class, 'index'])->name('home');

Route::prefix('produto')->group(function () {
  
    Route::get('/cadastrar', [ProdutoController::class, 'cadastrarProduto'])->name('cadastrar_produto');
    Route::post('/cadastrar_do', [ProdutoController::class, 'cadastrarProduto_do'])->name('cadastrar_produto_do');
    Route::get('/deletar/{id}', [ProdutoController::class, 'deletarProduto'])->name('deletar_produto');
    Route::get('/{categoria}', [ProdutoController::class, 'produtosPorCategoria'])->name('produto_por_categoria');


});

Route::prefix('categoria')->group(function () {
    Route::get('/', [ProdutoController::class, 'categoria'])->name('categoria');
    Route::get('/cadastrar', [ProdutoController::class, 'cadastrarCategoria'])->name('cadastrarCategoria');
    Route::post('/cadastrar_do', [ProdutoController::class, 'cadastrarCategoria_do'])->name('cadastrarCategoria_do');
});



Route::prefix('cliente')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('clientes');
});


Route::prefix('usuarios')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('usuarios');
});

Route::prefix('carrinho')->group(function () {

    Route::get('/', [ProdutoController::class, 'carrinho'])->name('carrinho');
    Route::get('/adicionar/{idproduto}', [ProdutoController::class, 'adicionarCarrinho'])->name('adicionarCarrinho');
});