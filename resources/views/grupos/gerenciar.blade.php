@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Painel') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<main>

    <br />
    <h4>Gerenciamento de grupos</h4>
    <br />
    <table class="table table-bordered" id="dataTable" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" style="width: 10%">Identificação</th>
                <th scope="col" style="width: 20%">Grupo</th>
                <th scope="col" style="width: 25%">Descrição</th>                
                <th scope="col" style="width: 9%"><center>Status</center></th>
           
                
            </tr>
        </thead>
        <tbody>  
            @foreach ($grupos as $lista)
                <tr>                  
                    <td><center>{{ $lista->id }}</center></td>
                    <td class="capitalize">{{ $lista->nome }}</td>
                    <td class="capitalize">{{ $lista->descricao }}</td>          
                    <td style="color: green"><center>Ativo</center></td>            
                    <td>Criado por {{ $lista->user->name }} em {{ date('d-m-y H:i', strtotime($lista->created_at)) }}</td>
                    <td>
                        <center>
                            <a href="{{route('grupos.editar', $lista->id)}}">
                                <img src="/img/edit.svg">
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{route('grupos.deletar', $lista->id)}}">
                                <img src="/img/trash.svg" width="25px">
                            </a>      
                        </center>
                    </td>
                </tr>
            @endforeach            
        </tbody>
    </table>
    @if(count($grupos) == 0)
        <p style="color: red">Não foi encontrado nenhum grupo.</p>
    @endif    

</main>


@endsection  {{-- CONTEUDO DA PAGE - FIM --}}

