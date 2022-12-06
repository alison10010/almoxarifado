@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Saída de Material') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<div class="card linha" style="margin-top: 4rem;width: 60%; margin-left: 25%">
  <h4>Saída de Material</h4>
  <br />
  <div class="row">   
    <form action="#" method="POST" autocomplete="off" enctype="multipart/form-data">
      @csrf  
      @method('POST')                   
      
      <div class="form-inline" style="padding: 0px 1px 0px 10px;">
        Quantidade de saída:
        <input type="number" name="saida" placeholder="Quantidade de saída" title="Quantidade Atual" class="form-control" id="saida" style="width:200px" min="1" max="{{$material->estoque_atual}}">
      </div>
      <div class="form-gropu" style="padding: 0px 1px 0px 10px;">
        Observações:
        <textarea name="observacao" id="observacao" class="form-control" placeholder="Observações da saída" style="resize: none;"></textarea>
      </div>

      <hr >
      <div class="modal-lado">
        <div class="form-inline especamento">
          Material: <label>{{$material->nome}}</label>          
        </div>
    
        <div class="form-inline especamento">
            Em estoque : <label>{{$material->estoque_atual}}</label> 
        </div>
        
        <div class="form-inline especamento">
          Grupo: <label>{{$material->grupo->nome}}</label> 
        </div>

        <div class="form-group especamento">
          Descrição do material: <label>{{$material->descricao}}</label> 
        </div>        


        <button type="submit" class="btn btn-primary">Gerar saída</button>

        <a type="button" class="btn btn-danger" href="{{ route('saida.material') }}">Cancelar</button></a>
      </div>

      <div class="modal-lado">
        <div class="max-width">
          <div class="imageContainer"> 
            <img src="/img/materiais/{{$material->image}}" alt="Material" id="imgPhoto">
          </div>
      </div>
      

    </form>
  </div>
</div> 
  
</div>

@endsection  {{-- CONTEUDO DA PAGE - FIM --}}