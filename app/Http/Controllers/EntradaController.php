<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Entrada;

use App\Repositories\Eloquent\EntradaRepository;  // REGRAS DE NEGOCIOS

class EntradaController extends Controller
{
    // HISTORICO DE ENTRADA
    public function store(Request $request, EntradaRepository $model)
    {
        try {            
            $model->salva($request);     
            return redirect('/movimentacao/entrada')->with('msg', 'Material adicionado com sucesso!');
        } catch (\Throwable $th) {
            return redirect('/movimentacao/entrada')->with('error', 'Erro ao adicionar o material, tente novamente!');
        }
    }

    // RELATORIO DE ENTRADA
    public function relatorioEntradaPDF(EntradaRepository $model)
    {
        try {
            $entrada = $model->relatorioMaterial();
            return view('relatorio.entrada.entradaPDF', ['entrada' => $entrada]);
        } catch (\Throwable $th) {
            return redirect('/entrada/entradaPDF')->with('error', 'Erro ao gerar o relatório, tente novamente!');
        }      
    }
}
