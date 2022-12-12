<?php

use App\Http\Controllers\RelatorioController;

Route::get('/relatorio/material', function () { return view('relatorio.entrada.material'); })->name('relatorio.material');
Route::get('/relatorio/entrada', [RelatorioController::class, 'relatorioPageEntrada'])->name('relatorio.entrada'); // PAGE DE RELATORIO.


Route::get('/relatorio/entradaSimplificado', [RelatorioController::class, 'relatorioSimplificado'])->name('relatorio.relatorioSimplificado'); // PAGE DE RELATORIO ESTOQUE.
Route::get('/relatorio/relatorioResumoEstoquePDF/{opcao?}', [RelatorioController::class, 'relatorioResumoEstoquePDF'])->name('relatorio.relatorioResumoEstoquePDF'); // PAGE DE RELATORIO ESTOQUE.


Route::get('/relatorio/saidaDetalhe', function () { return view('relatorio.saida.saidaDetalhe'); })->name('saida.saidaDetalhe'); // PAGE DE DETALHES DE SAIDA.