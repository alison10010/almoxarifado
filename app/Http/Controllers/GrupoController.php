<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\validaGrupo; // VALIDA OS CAMPOS

use App\Repositories\Eloquent\GrupoRepository;  // REGRAS DE NEGOCIOS

class GrupoController extends Controller
{
    public function create()
    {
        return view('grupos.inclusao'); 
    }

    // SALVO NO BD
    public function store(validaGrupo $request, GrupoRepository $model)  
    {
        try {
            $data = $request->all();
            $model->salva($data); // SALVA

            return redirect('grupos/inclusao')->with('msg', 'Grupo cadastrado com sucesso!');
        } catch (\Throwable $th) {
            return redirect('grupos/inclusao')->with('error', 'Erro ao cadastrar o Grupo, tente novamente!');
        }       

    }

    // PAGE DE GERENCIAMENTO
    public function gerenciarGrupos(GrupoRepository $model)
    {
        try {
            $grupos = $model->listGrupos();
            return view('grupos.gerenciar',['grupos' => $grupos]);
        } catch (\Throwable $th) {
            return redirect('grupos/gerenciar')->with('error', 'Erro ao listar os Grupo, tente novamente!');
        }
    }

    // PASSA VALORES PARA EDIÇÃO
    public function editar($id, GrupoRepository $model)
    {
        try {
            $grupo = $model->getById($id); // Recupera por sua primary key
            if(!$grupo){   // ID INEXISTENTE
                return redirect()->route('grupos.gerenciar');
            }
            return view('grupos.editar', ['grupo' => $grupo]);
        } catch (\Throwable $th) {
            return redirect('grupos/gerenciar')->with('error', 'Erro ao editar o Grupo, tente novamente!');
        }        
    }

    // METODO DE EDITAR
    public function update(validaGrupo $request, GrupoRepository $model)
    {
        try {
            $data = $request->all();
            $model->update($request->id, $data); // EDITA
            return redirect()->route('grupos.gerenciar')->with('msg', 'Grupos modificado com sucesso!');
        } catch (\Throwable $th) {
            return redirect('grupos/gerenciar')->with('error', 'Erro ao editar o Grupo, tente novamente!');
        }
        
    }

    // PASSA VALORES PARA "DELETA"
    public function deletar($id, GrupoRepository $model)
    {
        $grupo = $model->getById($id);
        if(!$grupo){
             return redirect()->route('grupos.gerenciar');
        }
        return view('grupos.delete', ['grupo' => $grupo]);
    }

    // METODO DE 'DELETE LOGICO' (STATUS = 0)
    public function delete(Request $request, GrupoRepository $model)
    {
        $model->delete($request->id);
        return redirect()->route('grupos.gerenciar')->with('msg', 'Grupo removido com sucesso!');
    }

}
