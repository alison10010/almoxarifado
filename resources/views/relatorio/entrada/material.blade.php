@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Relatório Entrada') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<main>

    <form  id="signup-form">
        <div>
            <div class="custom-control custom-checkbox custom-control-inline">
                <h3>Entrada de material - Detalhado</h3><br />
                <label>Caso queira de todo o periíodo, não informe a data.</label>
            </div>
        </div>
        <br />
        <div class="form-check">
            <input type="radio" class="form-check-input" id="todos" name="opcao" value="todos" checked onclick="relatorioOpcao('todos')">
            <label class="form-check-label" for="todos">Todos Materiais</label>
      
            <input type="radio" class="form-check-input" id="especifico" name="opcao" value="especifico" onclick="relatorioOpcao('especifico')" style="margin-left: 12px;">
            <label class="form-check-label" for="especifico">Material especifico</label>
      
        </div>
        
        <div class="form-group">
            <input type="number" name="material" placeholder="Digite a Identificação" class="form-control" id="material" value="{{ old('material') }}" style="max-width: 28rem;margin-top: 10px;display: none">
        </div>

        <div class="form-inline">
            <label class="label-text">Informe o período de entrada:</label>
            <input type="date" class="form-control" style="margin-left: 10px;width: 15%" name="dataOne" />
            <label style="padding: 0px 12px 0px 12px;"> até </label>
            <input type="date" class="form-control" style="width: 15%" name="dataTwo" /> 
            <button type="button" class="btn btn-primary" style="margin-left: 10px" onclick="frameRelatorioEntrada()">Gerar</button>
        </div>
    </form>

    <hr class="sidebar-divider"> 

    <iframe src="" style="width: 100%; min-height: 100vh;" id="frame" class="frame">Your browser isn't compatible</iframe>



@endsection  {{-- CONTEUDO DA PAGE - FIM --}}

