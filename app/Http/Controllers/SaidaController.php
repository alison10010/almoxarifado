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

    public function saidaStore(Request $request, SaidaRepository $model)
    {
        try {
            $saida = $model->salva($request);
            return view('movimentacao.saida.saidaDetalhe', ['saida' => $saida]);
        } catch (\Throwable $th) {
            return redirect('/movimentacao/saida')->with('error', 'Erro ao gerar saída, tente novamente!'); // REDIRECIONA PARA A HOME COM MSG
        }
    }

    // RELATORIO DE SAIDA
    public function relatorioSaidaPDF(SaidaRepository $model)
    {
        try {
            $saida = $model->relatorioSaida();
            return view('relatorio.saida.saidaPDF', ['saida' => $saida]);
        } catch (\Throwable $th) {
            return redirect('/movimentacao/saida')->with('error', 'Erro ao gerar o relatório, tente novamente!');
        }      
    }

    // BUSCA SAIDA DE MATERIAL VIA ID
    public function localizaSaidaMaterial(Request $request, SaidaRepository $model)
    {
        try {
            //$saida = $model->buscaSaida($request->material);
            $saida = $model->getById($request->material);
            if($saida){
                return view('movimentacao.saida.SaidaDetalhe', ['saida' => $saida, 'edit' => true]);
            }else{
                return redirect('/movimentacao/localiza')->with('error', 'Saída não encontrado!');
            }             
        } catch (\Throwable $th) {
            return redirect('/movimentacao/localiza')->with('error', 'Saída não encontrado!');
        } 
    } 

    // EDITAR SAIDA
    public function update(Request $request, SaidaRepository $model)
    {
        $model->updateSaida($request); // EDITA
        return redirect()->route('saida.Localiza')->with('msg', 'Saída modificado com sucesso!');
    }
}
