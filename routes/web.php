<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return redirect()->route('produtos.index');
});

// Esta única linha cria todas as rotas necessárias para o CRUD de produtos.
Route::resource('produtos', ProdutoController::class);