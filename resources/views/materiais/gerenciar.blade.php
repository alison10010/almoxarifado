@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Painel') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<main>

    <br />
    <h4>Gerenciamento de materiais</h4>
    <br />
    <table class="table table-bordered" id="dataTable" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" style="width: 10%">Identificação</th>
                <th scope="col" style="width: 15%">Material</th>
                <th scope="col" style="width: 12%"><center>Estoque Atual</center></th>
                <th scope="col" style="width: 12%"><center>Estoque minimo</center></th>
                <th scope="col" style="width: 25%">Decrição</th>
                <th scope="col" style="width: 13%"></th>
            </tr>
        </thead>
        <tbody>  
            @foreach ($materiais as $list) 
                <tr>
                    <td class="centro">{{ $list->id}}</td>
                    <td>{{ $list->nome}}</td>
                    <td class="centro">{{ $list->estoque_atual}}</td>
                    <td class="centro">{{ $list->estoque_minimo}}</td>
                    <td>{{ $list->descricao}}</td>
                    <td class="centro">
                            <a href="#" onclick="detalhesMaterial({{ $list->id }});">
                                <img src="/img/show.svg" width="28px">
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{route('materiais.editar', $list->id)}}">
                                <img src="/img/edit.svg">
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{route('materiais.deletar', $list->id)}}">
                                <img src="/img/trash.svg" width="25px">
                            </a>      
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>

    {{-- Modal de Detalhes de Funcionario --}}
    <div class="modal fade" id="detalheFunc" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
            <h5 class="modal-title">Informações</h5>
            </div>
            <div class="modal-body">

                <div class="row">                       

                    <div class="modal-lado">
                    Material:<b><a id="p-nome" style="margin-left: 10px"></b></a>

                    <br><br>
                    Estoque Atual:
                    <b><a id="p-estoque_atual" style="margin-left: 10px"></b></a>
                    
                    <br><br>
                    Estoque Minimo:
                    <b><a id="p-estoque_minimo"></b></a>
                    <br><br>

                    Grupo pertencente: 
                    <b><a id="p-grupo_id" style="margin-left: 7px"></b></a>
                    <br><br>

                    Situação:
                    <b><a>Ativo</b></a>
                    <br><br>

                    <p>Descrição: <b><a id="p-descricao"></a></b></p>
                    </div>
                    <div class="modal-lado" id="img-model">
                        <p id="p-image" >
                    </div>
                </div>                
            
            </div>
            <center><button class="btn btn-primary" type="button" data-dismiss="modal">Retornar</button></center>
            <br />

        </div>
    </div>

</main>


@endsection  {{-- CONTEUDO DA PAGE - FIM --}}

