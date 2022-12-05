@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Remover Grupo') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<div class="card linha" style="margin-top: 4rem;width: 60%;margin-left: 20%">
  <center><h4>Remoção de Material</h4></center>
  <br />
  <form action="{{route('materiais.delete', $material->id)}}" method="POST">
    @csrf
    @method('PATCH') 

      <div class="row">                       

        <div class="modal-lado">
        Material:<b><a>{{$material->nome}}</a></b></a>

        <br /><br />
        Estoque inicial:  <b><a>{{$material->estoque_inicial}}</b></a>

        <br><br>
        Estoque Minimo: <b><a>{{$material->estoque_minimo}}</a></b>
        <br><br>

        Estoque Atual: <b><a>10</b></a>
        <br><br>

        Grupo pertencente: 
        <b><a> {{$material->grupo->nome}}</b></a>
        <br><br>

        Situação:
        <b><a>Ativo</b></a>
        <br><br>

        <p>Descrição: <b><a>{{$material->descricao}}</a></b></p>

        <br />

        <input type="hidden" name="status" value="0"> 

        <button type="submit" class="btn btn-danger">Remover</button>

        <a type="button" class="btn btn-primary" href="{{ route('materiais.gerenciar') }}">Cancelar</button></a>

        </div>
        <div class="modal-lado">
          <div class="max-width">
            <div class="imageContainer"> 
              <img src="/img/materiais/{{$material->image}}" alt="Selecione uma imagem" id="imgPhoto">
            </div>
        </div>
      </div>

  </form>
  
</div>

@endsection  {{-- CONTEUDO DA PAGE - FIM --}}