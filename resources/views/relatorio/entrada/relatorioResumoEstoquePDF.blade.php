@extends('relatorio.modeloRelatorio')  {{-- USA O LAYOUT PADRÃO --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

  <div class="head">
        <p style="font-size: 12px"><b>Relatório de estoque</b></p>
        <p style="font-size: 12px">
            @php
                echo date('d/m/Y H:i'); 
            @endphp
        </p>
  </div>

    @if(isset($entrada['totalGeral']))
        <p style="font-size: 12px">Total geral de material: {{$entrada['totalGeral']}}</p>
    @endif
    <hr>
    <table> 
      <thead>
          <tr>
            <th scope="col" class="texto" style="width: 10%"><center>Identificação</center></th>
            <th scope="col" class="texto" style="width: 15%">Nome do Material</th>            
            <th scope="col" class="texto" style="width: 10%"><center>Estoque Atual</center></th>
            <th scope="col" class="texto" style="width: 10%"><center>Estoque mínimo</center></th>
          </tr>
      </thead>
      <tbody>       
        @if(isset($entrada['material'])) 
          @foreach ($entrada['material'] as $lista)
              <tr style="background: {{ $lista->estoque_atual > $lista->estoque_minimo ? '' : '#ff00003d' }};">                   
                <td class="texto"><center>{{ $lista->id }}</center></td> 
                <td class="texto">{{ $lista->nome }}</td>        
                <td class="texto"><center>{{ $lista->estoque_atual }}</center></td>            
                <td class="texto"><center>{{ $lista->estoque_minimo }}</center></td>            
              </tr>
          @endforeach
        
      </tbody>
    </table>
          @if(count($entrada['material']) == 0)
              <p class="texto" style="color: red">Não foi encontrado relatório de estoque.</p>
          @endif
        @endif

@endsection  {{-- CONTEUDO DA PAGE - FIM --}}