@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Relatorio de Saída') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<form id="signup-form" action="{{route('materiais.localizaEntrada')}}" method="POST" autocomplete="off" style="margin-top: 2rem">
  @csrf

  <div class="form-row">
    <div class="form-group">
      <h3>Saída de material</h3>      
    </div>
    <br /> 

    <div class="form-check">
      <input type="radio" class="form-check-input" id="todos" name="opcaoSaida" value="todos" checked onclick="saidaMaterial('todos')">
      <label class="form-check-label" for="todos">Todas saídas</label>

      <input type="radio" class="form-check-input" id="especifico" name="opcaoSaida" value="especifico" onclick="saidaMaterial('especifico')" style="margin-left: 12px">
      <label class="form-check-label" for="especifico">Saída especifica</label>
    </div>

    <div class="form-check" id="buscaMaterial" style="display: none;">
      <div class="form-group" style="margin-top: 10px">
        <input type="number" name="material" placeholder="Digite a Identificação" class="form-control" id="material" required value="{{ old('material') }}" style="max-width: 28rem;">
      </div>
    </div> 
    <br />
    <label>Caso queira de todo o periíodo, não informe a data.</label>
    <div class="form-inline" style="margin-top: 8px">
      <label class="label-text">Informe o período de saída:</label>
      <input type="date" class="form-control" style="margin-left: 10px;width: 15%" name="dataOne" />
      <label style="padding: 0px 12px 0px 12px;"> até </label>
      <input type="date" class="form-control" style="width: 15%" name="dataTwo" /> 
      <button type="button" class="btn btn-primary" style="margin-left: 10px" onclick="frameRelatorioSaida()">Gerar</button>
    </div>    
  </div>


</form>

  <hr class="sidebar-divider"> 

  <iframe src="" style="width: 100%; min-height: 100vh;" id="frame" class="frame">Your browser isn't compatible</iframe>


@endsection  {{-- CONTEUDO DA PAGE - FIM --}}