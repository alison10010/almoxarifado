@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Inclusão de Grupo') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<center>

<div class="card linha" style="margin-top: 4rem;width: 45%">
  <h4>Inclusão de Grupo</h4>
  <form action="{{route('grupos.store')}}" method="POST" autocomplete="off">
    @csrf

    <div class="form-group">
      <input type="text" name="nome" class="form-control" id="Nome_Grupo" placeholder="Informe o nome do grupo" required value="{{ old('Nome_Grupo') }}">
    </div>

    <div class="form-group">
      <textarea name="descricao" id="descricao_grupo" class="form-control" placeholder="Descrição do grupo" style="resize: none;"></textarea>
    </div>

    <br />
    
    <button type="submit" class="btn btn-primary">Adicionar</button>

    <button type="reset" class="btn btn-danger">Cancelar</button>

  </form>
  
</div>

</center>
@endsection  {{-- CONTEUDO DA PAGE - FIM --}}