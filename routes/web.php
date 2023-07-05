<?php

use App\Http\Controllers\Admin\{SuporteController};
use App\Http\Controllers\SiteController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/* Rotas principais */
Route::get('/', [SiteController::class, 'index']);

/* Rotas de compra */

/* Rotas de Suporte */
Route::post('/suporte', [SuporteController::class, 'registrar'])->name('suporte.registrar');
Route::get('/suporte/criar', [SuporteController::class, 'criar'])->name('suporte.criar');
Route::get('/suporte', [SuporteController::class, 'index'])->name('suporte.index');
