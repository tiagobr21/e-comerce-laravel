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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->
group(function(){
    
    Route::get('/', [ProdutoController::class, 'index'])->name('home');

    Route::prefix('produtos')->group(function () {
      
        Route::get('/{categoria}', [ProdutoController::class, 'produtosPorCategoria'])->name('produto_por_categoria');
    });


    Route::middleware(['admin'])->group(function(){
      
        Route::prefix('categoria')->group(function () {
            Route::get('/', [ProdutoController::class, 'categoria'])->name('categoria');
            Route::get('/cadastrar', [ProdutoController::class, 'cadastrarCategoria'])->name('cadastrarCategoria');
            Route::post('/cadastrar_do', [ProdutoController::class, 'cadastrarCategoria_do'])->name('cadastrarCategoria_do');
        });
        
        Route::prefix('cliente')->group(function () {
            Route::get('/cadastrar', [ClienteController::class, 'cadastrarCliente'])->name('cadastrar_cliente');
            Route::post('/cadastrar_do', [ClienteController::class, 'cadastrarCliente_do']);
            Route::get('/', [ClienteController::class, 'index'])->name('clientes');
            Route::get('/atualizar/{id}', [ClienteController::class, 'update_client']);
            Route::get('/update_client_do', [ClienteController::class, 'update_client_do']);
        });

    

        Route::prefix('produto')->group(function () {
            Route::get('/cadastrar', [ProdutoController::class, 'cadastrarProduto'])->name('cadastrar_produto');
            Route::get('/{categoria}', [ProdutoController::class, 'produtosPorCategoria']);
            Route::post('/cadastrar_do', [ProdutoController::class, 'cadastrarProduto_do'])->name('cadastrar_produto_do');
            Route::get('/deletar/{id}', [ProdutoController::class, 'deletarProduto'])->name('deletar_produto');
    
        });
    
         
       
    
    });

   

    Route::prefix('conta')->group(function () {
        Route::get('/informacoes', [ClienteController::class, 'info'])->name('info');
        Route::get('/update_account', [ClienteController::class, 'update_account']);
    });
    
    
    
    Route::prefix('carrinho')->group(function () {
    
        Route::get('/', [ProdutoController::class, 'carrinho'])->name('carrinho');
        Route::post('/finalizar', [ProdutoController::class, 'finalizarCarrinho'])->name('carrinho_finalizar');
        Route::get('/historico', [ProdutoController::class, 'historicoComprars'])->name('historico_compras');
        Route::get('/adicionar/{idproduto}', [ProdutoController::class, 'adicionarCarrinho'])->name('adicionarCarrinho');
        Route::get('/remover/{idpedido}', [ProdutoController::class, 'removerCarrinho'])->name('removerCarrinho');
    });
    
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});

