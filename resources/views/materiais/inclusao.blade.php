@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Cadastro de Material') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<center>

<div class="card linha" style="margin-top: 4rem;width: 60%">
  <h4>Inclusão de Material</h4>
  <br />
  <div class="row">   
    <form action="{{route('materiais.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf                   

    <div class="modal-lado">
      <div class="form-group">
        <input type="text" name="nome" class="form-control" id="Nome_Material" placeholder="Nome do Material" required value="{{ old('Nome_Material') }}">
      </div>
  
      <div class="form-inline" style="justify-content: space-between;display: flex;">
          <input type="number" name="estoque_atual" min="0" placeholder="Quantidade Atual" title="Quantidade inicial do material" class="form-control" id="estoque_atual" width="250px">
          <input type="number" name="estoque_minimo" min="0" placeholder="Estoque Mínimo" title="Avisa para repor quando estiver no valor mínimo" class="form-control" id="estoque_minimo" width="250px">
      </div>
  
      <br />
  
      <div class="form-group">
        <select id="grupo" name="grupo" class="form-control" required value="{{ old('grupo') }}">
            @foreach ($listGroup as $list)
              <option value="{{$list->id}}">{{$list->nome}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição do material" style="resize: none;"></textarea>
      </div>
  
      <br />
      
      <button type="submit" class="btn btn-primary">Adicionar</button>
  
      <button type="reset" class="btn btn-danger">Cancelar</button>
      
    </div>

    <div class="modal-lado">
      <div class="max-width">
        <div class="imageContainer">
            <img src="/img/foto.png" alt="Selecione uma imagem" id="imgPhoto">
        </div>
    </div>

    <br />
    <input type="file" id="flImage" name="image" accept="image/*">

    </div>

    </div>

  </form>





  
</div>

</center>
@endsection  {{-- CONTEUDO DA PAGE - FIM --}}