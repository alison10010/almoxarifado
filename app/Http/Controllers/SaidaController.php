<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Eloquent\MaterialRepository;  // REGRAS DE NEGOCIOS

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
}
