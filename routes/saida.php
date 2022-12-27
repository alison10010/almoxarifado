<?php

use App\Http\Controllers\SaidaController;

Route::put('/saida/update/{id}', [SaidaController::class, 'update'])->name('saida.update'); // ATUALIZA MOVIMENTAÇÃO DE SAIDA


