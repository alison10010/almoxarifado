@extends('relatorio.modeloRelatorio')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Relatorio de Saída') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

  <div class="head">
        <p style="font-size: 12px"><b>Relatório de saída de materiais</b></p>
        <p style="font-size: 12px">
            @php
                echo date('d/m/Y H:i'); 
            @endphp
        </p>
  </div>
  <div class="head">    
    <div class="head">
      @if(isset($saida['periodo']))
          <p>{{$saida['periodo']}}</p>
      @endif
    </div>
    
  </div>
    @if(isset($saida['totalGeral']))
        <p style="font-size: 12px">Total geral de saída: {{$saida['totalGeral']}}</p>
    @endif
    <hr>
    <table>
      <thead>
          <tr>
            <th scope="col" class="texto" style="width: 5%"><center>Identificação</center></th> 
            <th scope="col" class="texto" style="width: 15%">Nome do Material</th> 
            <th scope="col" class="texto" style="width: 8%"><center>Cod. Material</center></th> 
            <th scope="col" class="texto" style="width: 10%"><center>Saída (-)</center></th>
            <th scope="col" class="texto" style="width: 10%"><center>Núm. SEI</center></th>
            <th scope="col" class="texto" style="width: 15%"><center>Data Saída</center></th>
          </tr>
      </thead>
      <tbody>       
        @if(isset($saida['saida'])) 
          @foreach ($saida['saida'] as $lista)
              <tr>                   
                  <td class="texto"><center>{{ $lista->id }}</center></td>
                  <td class="texto"><center>{{ $lista->material->nome }}</center></td>
                  <td class="texto"><center>{{ $lista->material->id }}</center></td>
                  <td class="texto"><center>{{ $lista->quant_saida }}</center></td>
                  <td class="texto"><center>{{ $lista->num_sei }}</center></td>
                  <td class="texto"><center>{{ date('d/m/Y H:i', strtotime($lista->created_at)) }}</center></td> 
              </tr>
          @endforeach
        
      </tbody>
    </table>
        @if(count($saida['saida']) == 0)
              <p style="color: red" class="texto" style="font-size: 12px">Não foi encontrado relatório de saída.</p>
        @endif
    @endif

@endsection  {{-- CONTEUDO DA PAGE - FIM --}}