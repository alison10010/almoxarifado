@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Adicionar Material') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<form action="{{route('materiais.localiza')}}" method="POST" autocomplete="off" style="margin-top: 2rem">
  @csrf

  <div class="form-row">
    <div class="form-group">
      <h3>Entrada de material</h3>
    </div>
    <br />

    <div class="form-check">
      <input type="radio" class="form-check-input" id="idendificador" name="opcao" value="id" checked onclick="buscaMaterial('idendificador')">
      <label class="form-check-label" for="idendificador">N° de Identificação</label>

      <input type="radio" class="form-check-input" id="NomeMat" name="opcao" value="NomeMat" onclick="buscaMaterial('NomeMat')" style="margin-left: 12px">
      <label class="form-check-label" for="NomeMat">Nome do material</label>

    </div>

    <br />
    <div class="form-group">
      <input type="number" name="material" placeholder="Digite a Identificação" class="form-control" id="material" required value="{{ old('material') }}" style="max-width: 28rem;">
    </div>

  </div>
  
  <button type="submit" class="btn btn-primary">Buscar</button>
</form>

@if(isset($material))
  <br /><br />
  <table class="table table-bordered" id="dataTable" cellspacing="0">
    <thead>
        <tr>
          <th scope="col" style="width: 10%">Identificação</th>
          <th scope="col" style="width: 15%">Material</th>
          <th scope="col" style="width: 12%"><center>Estoque Atual</center></th>
          <th scope="col" style="width: 12%"><center>Estoque minimo</center></th>
          <th scope="col" style="width: 25%">Decrição</th>
          <th scope="col" style="width: 13%">Grupo</th>
            <th scope="col">Adicionar</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($material as $listas)
          <tr>
              <td>{{ $listas->id }}</td>
              <td>{{ $listas->nome }}</td>
              <td class="centro">{{ $listas->estoque_atual }}</td>
              <td class="centro">{{ $listas->estoque_minimo }}</td>
              <td>{{ $listas->descricao }}</td>
              <td class="centro">{{ $listas->grupo->nome }}</td>
              <td class="centro">
                  <a href="#" onclick="entradaModal({{ $listas->id }});">
                    <img src="/img/add.svg" width="30px">
                  </a>
              </td>
          </tr>
        @endforeach
    </tbody>

  </table>

  @if(count($material) == 0)
      <p style="color: red">Não foi encontrado o material informado.</p>
  @endif
 
@endif

{{-- Modal de Detalhes de Funcionario --}}
<div class="modal fade" id="entradaModal" role="dialog" style="margin-top: 10%;">
  <div class="modal-dialog">
  <div class="modal-content"> 
      <div class="modal-header">
      <h4 class="modal-title">Entrada de <label id="p-nome"></label></h4>
      </div>
      <div class="modal-body">
          <div class="row">
            <form action="{{route('entrada.store')}}" method="POST" autocomplete="off">
              @csrf 
              <center>
                <input type="number" name="quant_material" min="1" placeholder="Quantidade de material para inclusão" title="Quantidade de material para inclusão" class="form-control" id="quant_material" style="width: 90%">
                <input type="hidden" name="material_id" id="p-id">
                <br />
                <button class="btn btn-primary" type="submit">Adicionar</button>
                <button class="btn btn-danger" type="reset" data-dismiss="modal">cancelar</button>
              </center>
            </form>              
          </div>                
      </div>
      <br />

  </div>
</div>


@endsection  {{-- CONTEUDO DA PAGE - FIM --}}