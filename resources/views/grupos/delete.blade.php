@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Remover Grupo') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<center>

<div class="card linha" style="margin-top: 4rem;width: 45%">
  <h4>Edição de Grupo</h4>
  <br />
  <form action="{{route('grupos.delete', $grupo->id)}}" method="POST">
    @csrf {{-- NECESSARIO PARA REALIZAR A EDIÇÃO DO FORM NO BD --}}
    @method('PATCH') {{-- NECESSARIO PARA REALIZAR A EDIÇÃO DO FORM NO BD --}}

    <div class="form-group">
        <label for="nome">Nome do grupo:</label>
        <label class="txtExcluir"><b> {{$grupo->nome}} </b></label>                
    </div>
    <div class="form-group">
        <label for="descricaoSetor">Descrição do grupo:</label>
        <label class="txtExcluir"><b> {{$grupo->descricao}}  </b></label>           
    </div>
    <input type="hidden" name="status" value="0">

    <button type="submit" class="btn btn-danger">Excluir</button>
    <a type="button" class="btn btn-primary btn-md" href="{{ route('grupos.gerenciar') }}">Cancelar</button></a> 

  </form>
  
</div>

</center>
@endsection  {{-- CONTEUDO DA PAGE - FIM --}}