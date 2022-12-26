@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'saida de Material') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}
 
<form action="{{route('movimentacao.localizaSaidaMaterial')}}" method="POST" autocomplete="off" style="margin-top: 2rem">
  @csrf

  <div class="form-row">
    <div class="form-group">
      <h3>Saída de material</h3>
    </div> 
    <br />

    <div class="form-check">
      <label class="form-check-label" for="idendificador">N° de Identificação</label>
    </div>
    <br />
    <div class="form-group">
      <input type="number" name="material" placeholder="Digite a Identificação" class="form-control" id="material" required value="{{ old('material') }}" style="max-width: 28rem;">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Buscar</button>
</form>

@endsection  {{-- CONTEUDO DA PAGE - FIM --}}