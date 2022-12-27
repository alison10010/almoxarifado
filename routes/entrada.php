<?php

use App\Http\Controllers\EntradaController;

Route::post('/entrada/inclusao', [EntradaController::class, 'store'])->name('entrada.store'); // SALVA ENTRADA DE MATERIAL