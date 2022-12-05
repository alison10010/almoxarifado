<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;

use App\Models\Material;

class RelatorioRepository extends AbstractRepository{

    protected $model = Material::class;  // PASSA A VARIAVEL $model PARA AbstractRepository
  
    function allMateriais()
    {
        $opcao = request('opcao');

        if($opcao == 'todos'){
            $material = self::todosMateriais();
        }
        if($opcao == 'positivo'){
            $material = self::tipoMateriais('>');
        } 
        if($opcao == 'negativo'){
            $material = self::tipoMateriais('<');
        }    
        
        // N° TOTAL DE ENTRADA
        $i = 0;  
        $totalGeral = 0;
        foreach($material as $row) {
            $totalGeral += $row['estoque_atual'];
            $i += 1;
        }
        return (['material' => $material, 'totalGeral' => $totalGeral]); 
    }

    function todosMateriais()
    {
        $material = Material::where('status', '=', 1)
        ->orderBy('id', 'DESC')->get();
        return $material;
    }

    // RETORNA SALDO DE MATERIAL POSITIVO|NEGATIVO
    function tipoMateriais($operador)
    {
        $material = Material::where('status', '=', 1)
        ->whereColumn('estoque_atual', $operador, 'estoque_minimo')
        ->orderBy('id', 'DESC')->get();
        return $material;    
    }

}