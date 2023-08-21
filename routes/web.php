<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/clientes',                     [ClienteController::class  , 'index'])->name('clientes.index');

//Criação
Route::GET('clientes/create',               [ClienteController::class  , 'create'])->name('clientes.create');
Route::POST('clientes/create',              [ClienteController::class  , 'store'])->name('clientes.store');

//Pesquisa
Route::GET('/clientes/pesquisar',          [ClienteController::class  , 'pesquisar'])->name('clientes.pesquisar');

//Edição
Route::POST('clientes/{cliente}/edit',      [ClienteController::class  , 'update'])->name('clientes.update');
Route::GET('clientes/{cliente}/edit',       [ClienteController::class  , 'edit'])->name('clientes.edit');

//Deletess
Route::DELETE('clientes/{cliente}/destroy', [ClienteController::class  , 'destroy'])->name('clientes.destroy');

