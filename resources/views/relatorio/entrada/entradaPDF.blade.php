@extends('relatorio.modeloRelatorio')  {{-- USA O LAYOUT PADRÃO --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

  <div class="head">
        <p style="font-size: 12px"><b>Relatório de entrada de materiais</b></p>
        <p style="font-size: 12px">
            @php
                echo date('d/m/Y H:i'); 
            @endphp
        </p>
  </div>
  <div class="head">    
    <div class="head">
      @if(isset($entrada['periodo']))
          <p>{{$entrada['periodo']}}</p>
      @endif
    </div>

    @if(isset($entrada['tipo']))
      <p style="font-size: 12px">Tipo material: {{$entrada['tipo']}}</p>
    @endif
    
  </div>
    @if(isset($entrada['totalGeral']))
        <p style="font-size: 12px">Total geral de entrada: {{$entrada['totalGeral']}}</p>
    @endif
    <hr>
    <table>
      <thead>
          <tr>
            <th scope="col" class="texto" style="width: 15%">Nome do Material</th>
            <th scope="col" class="texto" style="width: 10%"><center>Identificação</center></th>
            <th scope="col" class="texto" style="width: 10%"><center>Entrada (+)</center></th>
            <th scope="col" class="texto" style="width: 10%"><center>Data entrada</center></th>
            <th scope="col" class="texto" style="width: 10%">Usuário</th>
          </tr>
      </thead>
      <tbody>       
        @if(isset($entrada['material'])) 
          @foreach ($entrada['material'] as $lista)
              <tr>                   
                  <td class="texto">{{ $lista->material->nome }}</td>
                  <td class="texto"><center>{{ $lista->material->id }}</center></td>
                  <td class="texto"><center>{{ $lista->quantidade }}</center></td>
                  <td class="texto"><center>{{ date('d/m/Y H:i', strtotime($lista->created_at)) }}</center></td> 
                  <td class="texto" class="capitalize">{{ $lista->user->name }}</td>             
              </tr>
          @endforeach
        
      </tbody>
    </table>
        @if(count($entrada['material']) == 0)
              <p style="color: red" class="texto" style="font-size: 12px">Não foi encontrado relatório de entrada do material.</p>
        @endif
    @endif

@endsection  {{-- CONTEUDO DA PAGE - FIM --}}