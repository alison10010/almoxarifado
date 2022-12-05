@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Relatório Entrada') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<main>

    <form  id="signup-form">
        <div>
            <div class="custom-control custom-checkbox custom-control-inline">
                <h3>Estoque</h3><br />
            </div>
        </div>
 
        <div class="form-check">
            <input type="radio" class="form-check-input" id="todos" name="opcao" value="todos" checked>
            <label class="form-check-label" for="todos">Todos Materiais</label>
      
            <input type="radio" class="form-check-input" id="positivo" name="opcao" value="positivo" style="margin-left: 12px;">
            <label class="form-check-label" for="positivo">Saldo positivo</label> 
            
            <input type="radio" class="form-check-input" id="negativo" name="opcao" value="negativo" style="margin-left: 12px;">
            <label class="form-check-label" for="negativo">Saldo negativo</label> 
        </div>

        <br />
        
        <div class="form-inline">
            <button type="button" class="btn btn-primary" onclick="frameResumoEstoque()">Gerar</button>
        </div>
    </form>

    <hr class="sidebar-divider"> 

    <iframe src="" style="width: 100%; min-height: 100vh;" id="frame" class="frame">Your browser isn't compatible</iframe>



@endsection  {{-- CONTEUDO DA PAGE - FIM --}}

