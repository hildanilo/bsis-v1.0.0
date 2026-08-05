<?php

use App\Http\Controllers\AssemblyOrderController;
use App\Http\Controllers\AssistanceOrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClosureController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FitterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

// Autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Área Protegida por Autenticação
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Fichas de Montagem
    Route::get('/fichas/{id}/impressao', [AssemblyOrderController::class, 'print'])->name('fichas.print');
    Route::resource('fichas', AssemblyOrderController::class);

    // Assistências Técnicas
    Route::resource('assistencias', AssistanceOrderController::class);

    // Clientes
    Route::resource('clientes', CustomerController::class);

    // Produtos
    Route::resource('produtos', ProductController::class);

    // Montadores
    Route::resource('montadores', FitterController::class);

    // Lojas
    Route::resource('lojas', StoreController::class);

    // Fechamentos
    Route::get('/fechamentos/{id}/impressao', [ClosureController::class, 'print'])->name('fechamentos.print');
    Route::resource('fechamentos', ClosureController::class);
});
