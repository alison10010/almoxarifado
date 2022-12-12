<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Eloquent\MaterialRepository;  // REGRAS DE NEGOCIOS

use App\Repositories\Eloquent\SaidaRepository;  // REGRAS DE NEGOCIOS

class SaidaController extends Controller
{
    // PASSA VALORES PARA FORM SAIDA    
    public function saidaForm($id, MaterialRepository $model)
    {
        $material = $model->getById($id);
        if(!$material){
            return redirect()->route('saida.material');
        }
        return view('movimentacao.saida.saidaForm', ['material' => $material]);
    }

    public function saidaStore(Request $request, SaidaRepository $model){
        try {
            $saida = $model->salva($request);
            return view('relatorio.saida.saidaDetalhe', ['saida' => $saida]);
        } catch (\Throwable $th) {
            return redirect('/movimentacao/saida')->with('error', 'Erro ao gerar saída, tente novamente!'); // REDIRECIONA PARA A HOME COM MSG
        }
    }
}
