<?php

use App\Http\Controllers\MaterialController;

Route::get('/materiais/inclusao', [MaterialController::class, 'create'])->name('materiais.inclusao');
Route::post('/materiais/inclusao', [MaterialController::class, 'store'])->name('materiais.store'); // SALVA NOVO MATERIAL

Route::get('/materiais/gerenciar', [MaterialController::class, 'gerenciarMateriais'])->name('materiais.gerenciar'); // LISTA DE MATERIAL
Route::get('/materiais/detalhes/{id}', [MaterialController::class, 'detalhes']); 
 
Route::get('/materiais/editar/{id}', [MaterialController::class, 'editar'])->name('materiais.editar'); // PAGE DE UPDATE
Route::put('/materiais/update/{id}', [MaterialController::class, 'update'])->name('materiais.update');

Route::get('/materiais/delete/{id}', [MaterialController::class, 'deletar'])->name('materiais.deletar'); // PAGE DE DEL
Route::patch('/materiais/delete/{id}', [MaterialController::class, 'delete'])->name('materiais.delete');