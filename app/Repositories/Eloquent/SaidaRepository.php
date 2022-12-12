<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;

use App\Http\Requests\validaMaterial; // VALIDA OS CAMPOS

use App\Models\Saida;

class SaidaRepository extends AbstractRepository{

    protected $model = Saida::class;  // PASSA A VARIAVEL $model PARA AbstractRepository

    // METODO DE SALVAR NO BD
    public function salva(Request $request)
    {
        $saida = new Saida; 

        $saida->material_id = $request['material_id'];
        $saida->quant_saida = $request['quant_saida'];
        $saida->possui_sei = $request['possui_sei'];
        $saida->num_sei = $request['num_sei'];
        $saida->destinatario = $request['destinatario'];
        $saida->observacao = $request['observacao'];     
        
        if($request['possui_sei'] == 'Nao'){
            $saida->num_sei = 'xxxx.xxxxx.xxxxx/xxxx-xx';
        }

        if(!$request->hasFile('image')){
            $saida->image = 'sem_foto.png';
        }

        // IMAGE UPLOAD
        if($request->hasFile('image') && $request->file('image')->isValid()){
           
            $requestImage = $request->image;
           
            $extension = $requestImage->extension(); // EXTENSAO DA IMAGE

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." .$extension; // GERA NOME UNICO P/ IMAGE 

            $requestImage->move(public_path('img/assinatura'), $imageName); // SALVA IMAGE NA PASTA PUBLIC EVENTS

            $saida->image = $imageName; // O Q SERÁ SALVO NO BD
        }

        $user = auth()->user();
        $saida->user_id = $user->id;
        $saida->status = 1;

        $saida->save();  // SALVA NO BD

        return $saida;

    }


    
   

}