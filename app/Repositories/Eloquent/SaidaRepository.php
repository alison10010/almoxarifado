<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;

use App\Http\Requests\validaMaterial; // VALIDA OS CAMPOS

use App\Models\Saida;

use App\Models\Material;

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
        
        if($request['possui_sei'] == 'Nao' || $request['num_sei'] == null){
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

            $requestImage->move(public_path('img/assinaturas'), $imageName); // SALVA IMAGE NA PASTA PUBLIC EVENTS

            $saida->image = $imageName; // O Q SERÁ SALVO NO BD
        }

        $user = auth()->user();
        $saida->user_id = $user->id;
        $saida->status = 1;

        self::diminuiEstoque($saida->material_id, $saida->quant_saida);

        $saida->save();  // SALVA NO BD

        return $saida;

    }

    // REMOVE DO ESTOQUE
    public function diminuiEstoque($id, $retirada)
    { 
        $material = Material::find($id); // LOCALIZA MATERIAL
        $estoque = $material->estoque_atual - $retirada;
        if($estoque >= 0){
            return Material::find($id)->update(["estoque_atual" => $estoque]);  // UPDATE NO BD
        }else {
            return Material::find($id)->update(["estoque_atual" => 0]); 
        }                
    }

    // RELATORIO DE ENTRADA DE MATERIAIS
    public function relatorioSaida()
    {
        $opcaoSaida = request('opcaoSaida');
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

        if($opcaoSaida == 'todos'){  // RETORNA SEM MATERIAL ESPECIFICO
            return self::allSaida($dataOne, $dataTwo);
        }
        if($opcaoSaida == 'especifico'){  // RETORNA SEM MATERIAL ESPECIFICO
            return self::idSaida($dataOne, $dataTwo, $material);
        }
  
    }

    // RETORNA TODAS AS SAIDAS
    function allSaida($dataOne, $dataTwo)
    {
        if(!$dataOne){
            $saida = self::listAtivos();
            $periodo = 'Saída de Materiais sem período definido';
        }else{
            $dataTwoF = date('Y-m-d 00:00:00' , strtotime("+1 days", strtotime($dataTwo)));
            $saida = Saida::where([['created_at', '>', $dataOne]])
            ->where('created_at', '<', $dataTwoF)
            ->orderBy('id', 'DESC')->get();

            // FORMATA BR
            $dataOne = date('d/m/Y' , strtotime($dataOne));
            $dataTwo = date('d/m/Y' , strtotime($dataTwo));

            $periodo = 'Saída de Materiais no Período de '.$dataOne.' a '.$dataTwo;
        }

        // N° TOTAL DE SAIDA
        $i = 0;  
        $totalGeral = 0;
        foreach($saida as $row) {
            $totalGeral += $row['quant_saida'];
            $i += 1;
        }

        return (['saida' => $saida, 'periodo' => $periodo, 'totalGeral' => $totalGeral]);
    }


    // METODO DE BUSCAR PELO ID
    public function idSaida($dataOne, $dataTwo, $identificador)
    {
        if(!$dataOne){
            $saida = Saida::where([['material_id', '=', $identificador]])->orderBy('id', 'DESC')->get();
            $periodo = 'Saída de Materiais sem período definido';
        }else{
            $dataTwoF = date('Y-m-d 00:00:00' , strtotime("+1 days", strtotime($dataTwo)));
            $saida = Saida::where([['created_at', '>', $dataOne]])
            ->where('created_at', '<', $dataTwoF)
            ->where('material_id', '=', $identificador)
            ->orderBy('id', 'DESC')->get();

            // FORMATA BR
            $dataOne = date('d/m/Y' , strtotime($dataOne));
            $dataTwo = date('d/m/Y' , strtotime($dataTwo));

            $periodo = 'Saída de Materiais no Período de '.$dataOne.' a '.$dataTwo;
        }

        // N° TOTAL DE SAIDA
        $i = 0;  
        $totalGeral = 0;
        foreach($saida as $row) {
            $totalGeral += $row['quant_saida'];
            $i += 1;
        }

        return (['saida' => $saida, 'periodo' => $periodo, 'totalGeral' => $totalGeral]);

        return $saida;
    }

     // METODO DE SALVAR NO BD
     public function updateSaida(Request $request)
     {

        $data = $request->all();  

        if(!$request->num_sei){
            $data['num_sei'] = 'xxxx.xxxxx.xxxxx/xxxx-xx';
        }

        // IMAGE UPLOAD
        if($request->hasFile('image') && $request->file('image')->isValid()){
                            
            $requestImage = $request->image;

            $extension = $requestImage->extension(); // EXTENSAO DA IMAGE

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." .$extension; // GERA NOME UNICO P/ IMAGE 

            $requestImage->move(public_path('img/assinaturas'), $imageName); // SALVA IMAGE NA PASTA PUBLIC EVENTS

            $data ['image'] = $imageName; // O Q SERÁ SALVO NO BD

            Saida::find($request->id)->update($data);
        }
 
         Saida::find($request->id)->update($data);  // SALVA NO BD    
     }
   

}