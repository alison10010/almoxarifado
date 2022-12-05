<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Material;

use App\Http\Requests\validaMaterial; // VALIDA OS CAMPOS

use App\Repositories\Eloquent\MaterialRepository;  // REGRAS DE NEGOCIOS

class MaterialController extends Controller
{
    //
    public function create(MaterialRepository $model)
    {
        $listGroup = $model->listGrupo();
        return view('materiais.inclusao', ['listGroup' => $listGroup]);
    } 

    // METODO DE SALVAR NO BD
    public function store(Request $request, MaterialRepository $model)
    {
        try {
            $model->salva($request);
            return redirect('/materiais/gerenciar')->with('msg', 'Material incluso com sucesso!'); // REDIRECIONA PARA A HOME COM MSG
        } catch (\Throwable $th) {
            return redirect('materiais/gerenciar')->with('error', 'Erro ao cadastrar, tente novamente!'); // REDIRECIONA PARA A HOME COM MSG
        }
    }

    public function gerenciarMateriais(MaterialRepository $model)
    {
        $materiais = $model->listMateriais();
        return view('materiais.gerenciar',['materiais' => $materiais]);
    }

    // DETALHES DE MATERIAL
    public function detalhes($id, MaterialRepository $model)
    {
        $id = request('id'); // PARAMETRO URL
        $material = $model->detalhesMat($id);
        return json_encode($material); 
    }

    // PASSA VALORES PARA EDIÇÃO
    public function editar($id, MaterialRepository $model)
    {
        try {
            $material = $model->getById($id); // Recupera por sua primary key
            if(!$material){   // ID INEXISTENTE
                return redirect()->route('materiais.gerenciar');
            }
            return view('materiais.editar', ['material' => $material]);
        } catch (\Throwable $th) {
            return redirect('materiais/gerenciar')->with('error', 'Erro ao editar o material, tente novamente!');
        }        
    }

    // METODO DE EDITAR
    public function update(Request $request, MaterialRepository $model)
    {
        $model->updateMaterial($request); // EDITA
        return redirect()->route('materiais.gerenciar')->with('msg', 'Material modificado com sucesso!');
    }

    // PASSA VALORES PARA "DELETA"
    public function deletar($id, MaterialRepository $model)
    {
        $material = $model->getById($id);
        if(!$material){
             return redirect()->route('materiais.gerenciar');
        }
        return view('materiais.delete', ['material' => $material]);
    }

    // METODO DE 'DELETE LOGICO' (STATUS = 0)
    public function delete(Request $request, MaterialRepository $model)
    {
        $model->delete($request->id);
        return redirect()->route('materiais.gerenciar')->with('msg', 'Material removido com sucesso!');
    }

    // BUSCA MATERIAL VIA ID || NOME
    public function localizaMaterial(Request $request, MaterialRepository $model)
    {
        try {
            $material = $model->buscaMaterial($request->material);
            return view('movimentacao.entrada.entrada', ['material' => $material]);

        } catch (\Throwable $th) {
            return redirect('/movimentacao/entrada')->with('error', 'Material não encontrado!');
        } 
    }

} 
