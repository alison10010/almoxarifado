<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;

use App\Models\Entrada;

use App\Models\Material;

class EntradaRepository extends AbstractRepository{

    protected $model = Entrada::class;  // PASSA A VARIAVEL $model PARA AbstractRepository

    // SALVA ENTRADA
    public function salva(Request $request) 
    {
        $entrada = new Entrada;

        $entrada->material_id = $request->material_id;
        $entrada->quantidade = $request->quant_material;
 
        $user = auth()->user();
        $entrada->user_id = $user->id;

        $entrada->status = 1;

        $entrada->save(); 

        self::addMaterial($request->material_id, $request->quant_material);
    }

    // ADD MATERIAL
    public function addMaterial($id, $quant)
    {
        $material = Material::find($id); // PEGA OS DADOS DO MATERIAL

        $quant += $material->estoque_atual;

        Material::find($id)->update(['estoque_atual' => $quant]);
    }
   
    // RELATORIO DE ENTRADA DE MATERIAIS
    public function relatorioMaterial()
    {
        $identificacao = request('identificacao');
        $material = request('material');
        $dataOne = request('dataOne');
        $dataTwo = request('dataTwo');

        if($dataOne || $dataTwo) // SETANDO DATAS ESPECIFICAS
        {
            if($dataOne && !$dataTwo){ // CASO MARQUE SOMENTE 1° DATA
                $dataTwo = date('Y-m-d 00:00:00' , strtotime($dataOne));
            }
            if(!$dataOne && $dataTwo){ // CASO MARQUE SOMENTE 2° DATA
                $dataOne = date('Y-m-d 00:00:00' , strtotime($dataTwo));
                $dataTwo = date('Y-m-d 00:00:00' , strtotime("+1 days", strtotime($dataOne)));
            }
        }

        if($identificacao == 'false'){  // RETORNA SEM MATERIAL ESPECIFICO
            return self::allMateriais($dataOne, $dataTwo);
        }

        if($identificacao == 'true'){
            return self::especificoMaterial($dataOne, $dataTwo, $material);
        }    
    }

    function allMateriais($dataOne, $dataTwo)
    {
        if(!$dataOne){
            $material = self::listAtivos();
            $periodo = 'Entrada de Materiais sem período definido';
        }else{
            $dataTwoF = date('Y-m-d 00:00:00' , strtotime("+1 days", strtotime($dataTwo)));
            $material = Entrada::where([['created_at', '>', $dataOne]])
            ->where('created_at', '<', $dataTwoF)
            ->orderBy('id', 'DESC')->get();

            // FORMATA BR
            $dataOne = date('d/m/Y' , strtotime($dataOne));
            $dataTwo = date('d/m/Y' , strtotime($dataTwo));

            $periodo = 'Entrada de Materiais no Período de '.$dataOne.' a '.$dataTwo;
        }

        // N° TOTAL DE ENTRADA
        $i = 0;  
        $totalGeral = 0;
        foreach($material as $row) {
            $totalGeral += $row['quantidade'];
            $i += 1;
        }

        $tipo = 'Todos';

        return (['material' => $material, 'periodo' => $periodo, 'totalGeral' => $totalGeral]);
    }

    function especificoMaterial($dataOne, $dataTwo, $id)
    { 
        if(!$dataOne){
            $material = self::listAtivos();
            $material = Entrada::where('status', '=', 1)
            ->where('material_id', '=', $id)
            ->orderBy('id', 'DESC')->get();

            $periodo = 'Entrada de Materiais sem período definido';

        }else{
            $dataTwoF = date('Y-m-d 00:00:00' , strtotime("+1 days", strtotime($dataTwo)));
            $material = Entrada::where([['created_at', '>', $dataOne]])
            ->where('created_at', '<', $dataTwoF)
            ->where('material_id', '=', $id)
            ->orderBy('id', 'DESC')->get();

            // FORMATA BR
            $dataOne = date('d/m/Y' , strtotime($dataOne));
            $dataTwo = date('d/m/Y' , strtotime($dataTwo));

            $periodo = 'Entrada de Materiais no Período de '.$dataOne.' a '.$dataTwo;
        }

        $tipo = 'Específico';

        // N° TOTAL DE ENTRADA
        $i = 0;  
        $totalGeral = 0;
        foreach($material as $row) {
            $totalGeral += $row['quantidade'];
            $i += 1;
        }

        return (['material' => $material, 'periodo' => $periodo, 'totalGeral' => $totalGeral, 'tipo' => $tipo]);
    }
  

}