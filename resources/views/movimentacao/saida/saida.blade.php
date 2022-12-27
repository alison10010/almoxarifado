@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'saida de Material') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<form action="{{route('materiais.localizaSaida')}}" method="POST" autocomplete="off" style="margin-top: 2rem">
  @csrf
 
  <div class="form-row">
    <div class="form-group">
      <h3>Saída de material</h3>
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
            <th scope="col" class="centro">Saída</th>
        </tr>
    </thead>
    <tbody>  
        @foreach ($material as $listas)
          <tr> 
              <td><center>{{ $listas->id }}</center></td>
              <td>{{ $listas->nome }}</td>
              <td class="centro" style="background: {{ $listas->estoque_atual >= $listas->estoque_minimo ? '' : '#ff00003d' }};">{{ $listas->estoque_atual }}</td>
              <td class="centro">{{ $listas->estoque_minimo }}</td>
              <td>{{ $listas->descricao }}</td>
              <td class="centro">{{ $listas->grupo->nome }}</td>
              <td class="centro">                
                @if($listas->estoque_atual <= 0)
                    <p style="color: red">Sem estoque</p>                    
                @else
                  <a href="{{route('saida.saidaForm', $listas->id)}}"> 
                    <img src="/img/saida.svg" width="30px">
                  </a>
                @endif                  
              </td>
          </tr>
        @endforeach
    </tbody>

  </table>

  @if(count($material) == 0)
      <p style="color: red">Não foi encontrado o material informado.</p>
  @endif
 
@endif


@endsection  {{-- CONTEUDO DA PAGE - FIM --}}