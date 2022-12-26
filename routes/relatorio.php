<?php

use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\SaidaController;

// ENTRADA DE MATERIAL
Route::get('/relatorio/material/entrada', function () { return view('relatorio.entrada.material'); })->name('relatorio.material');
Route::get('/relatorio/entrada', [RelatorioController::class, 'relatorioPageEntrada'])->name('relatorio.entrada'); // PAGE DE RELATORIO.

Route::get('/relatorio/entradaSimplificado', [RelatorioController::class, 'relatorioSimplificado'])->name('relatorio.relatorioSimplificado'); // PAGE DE RELATORIO ESTOQUE.
Route::get('/relatorio/relatorioResumoEstoquePDF/{opcao?}', [RelatorioController::class, 'relatorioResumoEstoquePDF'])->name('relatorio.relatorioResumoEstoquePDF'); // PAGE DE RELATORIO ESTOQUE.


// SAIDA DE MATERIAL
Route::get('/relatorio/material/saida', function () { return view('relatorio.saida.material'); })->name('relatorio.materialSaida');

Route::put('/saida/update/{id}', [SaidaController::class, 'update'])->name('saida.update');