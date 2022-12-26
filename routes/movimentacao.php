<?php

use App\Http\Controllers\SaidaController;

Route::get('/movimentacao/entrada', function () { return view('movimentacao.entrada.entrada'); })->name('entrada.material');

Route::get('/movimentacao/saida', function () { return view('movimentacao.saida.saida'); })->name('saida.material');


Route::get('/movimentacao/saida/{id}', [SaidaController::class, 'saidaForm'])->name('saida.saidaForm'); // PAGE DE SAIDA DE MATERIAL.

Route::post('/movimentacao/saidaMaterial', [SaidaController::class, 'saidaStore'])->name('saida.store'); // SALVA SAIDA DE MATERIAL

Route::get('/movimentacao/saida/saidaDetalhe', function () { return view('movimentacao.saida.saidaDetalhe'); })->name('saida.saidaDetalhe'); // PAGE DE DETALHES DE SAIDA. 
 
Route::get('/movimentacao/localiza', function () { return view('movimentacao.saida.LocalizaSaida'); })->name('saida.Localiza'); // PAGE DE SAIDA DE MATERIAL PARA EDIÇÃO.

Route::post('/movimentacao/localiza', [SaidaController::class, 'localizaSaidaMaterial'])->name('movimentacao.localizaSaidaMaterial'); // PAGE DE SAIDA DE MATERIAL PARA EDIÇÃO.