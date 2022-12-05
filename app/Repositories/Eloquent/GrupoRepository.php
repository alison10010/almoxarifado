<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;

use App\Http\Requests\validaGrupo; // VALIDA OS CAMPOS

use App\Models\Grupo;

class GrupoRepository extends AbstractRepository{

    protected $model = Grupo::class;  // PASSA A VARIAVEL $model PARA AbstractRepository

    // BUSCA POR PATRIMONIO 
    public function salva(array $data) 
    {
        $user = auth()->user();
        $data['user_id'] = $user->id;
        $data['status'] = 1;
        self::store($data); 
    }

    // METODO DE LISTAR
    public function listGrupos()
    {
        $grupo = self::listAtivos();
        return $grupo;
    }

    

}