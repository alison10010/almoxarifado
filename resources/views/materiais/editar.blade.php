@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Editar Material') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<center>

<div class="card linha" style="margin-top: 4rem;width: 60%">
  <h4>Edição de Material</h4>
  <br />
  <div class="row">   
    <form action="{{route('materiais.update', $material->id)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
      @csrf  
      @method('PUT')                   

      <div class="modal-lado">
        <div class="form-group">
          <input type="text" name="nome" class="form-control" id="Nome_Material" placeholder="Nome do Material" required value="{{$material->nome}}">
        </div>
    
        <div class="form-inline" style="justify-content: space-between;display: flex;">
            <input type="number" name="estoque_atual" placeholder="Quantidade Atual" title="Quantidade Atual" class="form-control" id="estoque_atual" width="250px" value="{{$material->estoque_atual}}">
            <input type="number" name="estoque_minimo" placeholder="Estoque Mínimo" title="Avisa para repor quando estiver no valor mínimo" class="form-control" id="estoque_minimo" width="250px" value="{{$material->estoque_minimo}}">
        </div>
        <br />
    
        <div class="form-group">
          <select id="grupo" name="grupo_id" class="form-control" required value="{{ old('grupo') }}">
                <option value="{{$material->grupo->id}}" selected>{{$material->grupo->nome}}</option>
          </select>
        </div>
        <div class="form-group">
          <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição do material" style="resize: none;">{{$material->descricao}}</textarea>
        </div>
        
        <br />

        <button type="submit" class="btn btn-primary">Concluir</button>

        <a type="button" class="btn btn-danger" href="{{ route('materiais.gerenciar') }}">Cancelar</button></a>
      </div>

      <div class="modal-lado">
        <div class="max-width">
          <div class="imageContainer"> 
            <input type="file" id="flImage" name="image" accept="image/*">
            <img src="/img/materiais/{{$material->image}}" alt="Selecione uma imagem" id="imgPhoto">
          </div>
      </div>
      

    </form>
  </div>
</div> 
  
</div>

</center>
@endsection  {{-- CONTEUDO DA PAGE - FIM --}}