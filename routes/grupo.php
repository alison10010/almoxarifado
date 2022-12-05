<?php

use App\Http\Controllers\GrupoController;

Route::get('/grupos/gerenciar', [GrupoController::class, 'gerenciarGrupos'])->name('grupos.gerenciar'); // PAGE DE CAD.

Route::get('/grupos/inclusao', [GrupoController::class, 'create'])->name('grupos.inclusao'); // PAGE DE CAD.
Route::post('/grupos/inclusao', [GrupoController::class, 'store'])->name('grupos.store'); // SALVA NOVO GRUPO

Route::get('/grupos/editar/{id}', [GrupoController::class, 'editar'])->name('grupos.editar'); // PAGE DE UPDATE.
Route::put('/grupos/update/{id}', [GrupoController::class, 'update'])->name('grupos.update');

Route::get('/grupos/delete/{id}', [GrupoController::class, 'deletar'])->name('grupos.deletar');
Route::patch('/grupos/delete/{id}', [GrupoController::class, 'delete'])->name('grupos.delete');