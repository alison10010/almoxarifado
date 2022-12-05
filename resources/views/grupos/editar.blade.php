@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Editar Grupo') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<center>

<div class="card linha" style="margin-top: 4rem;width: 45%">
  <h4>Edição de Grupo</h4>
  <br />
  <form action="{{route('grupos.update', $grupo->id)}}" method="POST" autocomplete="off">
    @csrf {{-- NECESSARIO PARA REALIZAR A EDIÇÃO DO FORM NO BD --}}
    @method('PUT') {{-- NECESSARIO PARA REALIZAR A EDIÇÃO DO FORM NO BD --}}

    <div class="form-group">
        <input type="text" name="nome" class="form-control" id="Nome_Grupo" value="{{$grupo->nome}}" placeholder="Informe o nome do grupo" required>
    </div>

    <div class="form-group">
        <textarea name="descricao" id="descricao_grupo" class="form-control" placeholder="Descrição do grupo" style="resize: none;">{{$grupo->descricao}}</textarea>
    </div>

    <br />

    <a type="button" class="btn btn-danger btn-md" href="{{ route('grupos.gerenciar') }}">Cancelar</button></a>
    <button type="submit" class="btn btn-primary">Concluir</button>

  </form>
  
</div>

</center>
@endsection  {{-- CONTEUDO DA PAGE - FIM --}}