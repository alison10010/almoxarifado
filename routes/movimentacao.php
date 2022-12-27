<?php

use App\Http\Controllers\SaidaController;
use App\Http\Controllers\MaterialController;

// ENTRADA
Route::get('/movimentacao/entrada', function () { return view('movimentacao.entrada.entrada'); })->name('entrada.material'); // PAGE ENTRADA MATERIAL
Route::post('/movimentacao/entrada', [MaterialController::class, 'localizaEntradaMaterial'])->name('materiais.localizaEntrada'); // LISTA MATERIAIS NA PAGE

// SAIDA
Route::get('/movimentacao/saida', function () { return view('movimentacao.saida.saida'); })->name('saida.material'); // PAGE SAIDA MATERIAL
Route::post('/movimentacao/saida', [MaterialController::class, 'localizaSaidaMaterial'])->name('materiais.localizaSaida'); // LISTA MATERIAIS NA PAGE

// 
Route::get('/movimentacao/saida/{id}', [SaidaController::class, 'saidaForm'])->name('saida.saidaForm'); // FORM DE SAIDA DE MATERIAL
Route::post('/movimentacao/saidaMaterial', [SaidaController::class, 'saidaStore'])->name('saida.store'); // SALVA SAIDA DE MATERIAL

//
Route::get('/movimentacao/saida/saidaDetalhe', function () { return view('movimentacao.saida.saidaDetalhe'); })->name('saida.saidaDetalhe'); // PAGE DE DETALHES DE SAIDA. 

//
Route::get('/movimentacao/localiza', function () { return view('movimentacao.saida.LocalizaSaida'); })->name('saida.Localiza'); // PAGE LOCALIZA SAIDA
Route::post('/movimentacao/localiza', [SaidaController::class, 'localizaSaidaMaterial'])->name('movimentacao.localizaSaidaMaterial'); // PAGE COM INFO DA SAIDA DE MATERIAL