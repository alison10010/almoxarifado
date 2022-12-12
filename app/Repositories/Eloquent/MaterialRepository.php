<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;

use App\Http\Requests\validaMaterial; // VALIDA OS CAMPOS

use App\Models\Material;

use App\Models\Grupo;

class MaterialRepository extends AbstractRepository{

    protected $model = Material::class;  // PASSA A VARIAVEL $model PARA AbstractRepository

    public function listGrupo() 
    {
        $listGrupo = Grupo::where('status', '=', '1')
        ->orderBy('id', 'DESC')->get();

        return $listGrupo;
    }

    // METODO DE LISTAR
    public function listMateriais()
    {
        $materiais = self::listAtivos();
        return $materiais;
    } 

    public function detalhesMat($id)
    {
        $material = Material::find($id); // PEGA OS DADOS DO MATERIAL
        $material->user_id = $material->user->nome; 
        $material->grupo_id = $material->grupo->nome;

        return $material;
    }

    // METODO DE SALVAR NO BD
    public function salva(Request $request)
    {

        $material = new Material; 

        $material->nome = $request['nome'];
        $material->estoque_atual = $request['estoque_atual'];
        $material->estoque_minimo = $request['estoque_minimo'];
        $material->grupo_id = $request['grupo'];
        $material->descricao = $request['descricao'];
        $user = auth()->user();
        $material->user_id = $user->id;
        $material->status = 1;

        if(!$request->hasFile('image')){
            $material->image = 'sem_foto.png';
        }

        // IMAGE UPLOAD
        if($request->hasFile('image') && $request->file('image')->isValid()){
           
            $requestImage = $request->image;
           
            $extension = $requestImage->extension(); // EXTENSAO DA IMAGE

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." .$extension; // GERA NOME UNICO P/ IMAGE 

            $requestImage->move(public_path('img/materiais'), $imageName); // SALVA IMAGE NA PASTA PUBLIC EVENTS

            $material->image = $imageName; // O Q SERÁ SALVO NO BD
        }

        $material->save();  // SALVA NO BD
    }

    // METODO DE SALVAR NO BD
    public function updateMaterial(Request $request)
    {
        $data = $request->all(); 

        // IMAGE UPLOAD
        if($request->hasFile('image') && $request->file('image')->isValid()){
                            
            $requestImage = $request->image;

            $extension = $requestImage->extension(); // EXTENSAO DA IMAGE

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." .$extension; // GERA NOME UNICO P/ IMAGE 

            $requestImage->move(public_path('img/materiais'), $imageName); // SALVA IMAGE NA PASTA PUBLIC EVENTS

            $data ['image'] = $imageName; // O Q SERÁ SALVO NO BD

            Material::find($request->id)->update($data);
        }

        Material::find($request->id)->update($data);  // SALVA NO BD    
    }

    // METODO DE BUSCAR PELO ID OU NOME
    public function buscaMaterial($identificador)
    {
        $material = Material::where([['id', '=', $identificador]])->orWhere('nome','LIKE','%'.$identificador.'%')->orderBy('id', 'DESC')->get();
        return $material;
    }
   

}