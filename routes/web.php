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

// ROTAS NA MESMA PASTA

Route::middleware('auth')->group(function () {  // PAGINAS QUE PRECISA TÁ LOGADO

    require __DIR__.'/grupo.php'; 

    require __DIR__.'/material.php'; 
    
    require __DIR__.'/saida.php'; 
    
    require __DIR__.'/entrada.php'; 

    require __DIR__.'/relatorio.php'; 
    
    require __DIR__.'/movimentacao.php'; 

    Route::get('/', function () { return view('dashboard'); });

    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard'); 

});

 
require __DIR__.'/auth.php';
