<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EntradaController;

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

Route::middleware('auth')->group(function () {  // PAGINA PARA CRIAR UM EVENTO PRECISA TÁ LOGADO

    require __DIR__.'/grupo.php';

    require __DIR__.'/material.php';

    require __DIR__.'/relatorio.php';

    Route::get('/movimentacao/entrada', function () { return view('movimentacao.entrada.entrada'); })->name('entrada.material');

    Route::post('/entrada/inclusao', [EntradaController::class, 'store'])->name('entrada.store'); 

    Route::get('/', function () { return view('dashboard'); });

    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::get('/relatorioEntrada/{identificacao?}{dataOne?}{dataTwo?}', [EntradaController::class, 'relatorioEntradaPDF'])->name('relatorio.entradaPDF');
    

});

 
require __DIR__.'/auth.php';
