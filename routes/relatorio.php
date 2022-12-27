<?php

use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\SaidaController;
use App\Http\Controllers\EntradaController;

// ENTRADA DE MATERIAL
Route::get('/relatorio/material/entrada', function () { return view('relatorio.entrada.material'); })->name('relatorio.entrada'); // PAGE DE RELATORIO.
Route::get('/relatorio/entrada/{identificacao?}{dataOne?}{dataTwo?}', [EntradaController::class, 'relatorioEntradaPDF'])->name('relatorio.entradaPDF'); // IFRAME ENTRADA

// SAIDA DE MATERIAL
Route::get('/relatorio/material/saida', function () { return view('relatorio.saida.material'); })->name('relatorio.materialSaida');
Route::get('/relatorio/saida/{saida?}{identificacao?}{dataOne?}{dataTwo?}', [SaidaController::class, 'relatorioSaidaPDF'])->name('relatorio.saidaPDF'); // IFRAME SAIDA

// ESTOQUE DE MATERIAL
Route::get('/relatorio/entradaSimplificado', [RelatorioController::class, 'relatorioSimplificado'])->name('relatorio.relatorioSimplificado'); // PAGE DE RELATORIO ESTOQUE.
Route::get('/relatorio/relatorioResumoEstoquePDF/{opcao?}', [RelatorioController::class, 'relatorioResumoEstoquePDF'])->name('relatorio.relatorioResumoEstoquePDF'); // // IFRAME ESTOQUE.
