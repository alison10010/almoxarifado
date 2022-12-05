<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Eloquent\RelatorioRepository;  // REGRAS DE NEGOCIOS

class RelatorioController extends Controller
{
    public function relatorioEntrada()
    {
        return view('relatorio.entrada.material'); 
    }

    public function relatorioSimplificado()
    {
        return view('relatorio.entrada.relatorioSimplificado');
    }

    public function relatorioResumoEstoquePDF(RelatorioRepository $model)
    {
        try {
            $entrada = $model->allMateriais();
            return view('relatorio.entrada.relatorioResumoEstoquePDF', ['entrada' => $entrada]);
        } catch (\Throwable $th) {
            return redirect('/relatorio/entradaSimplificado')->with('error', 'Erro ao gerar o relatório, tente novamente!');
        }              
    }

}
