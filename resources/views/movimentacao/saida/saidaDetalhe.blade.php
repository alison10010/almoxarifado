
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Detalhe de saída</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/css/style.css" rel="stylesheet">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  
  <link href="/css/estiloManual.css" rel="stylesheet">

  <style>

    p{
        font-size: 12px;
    }
    p,tr,h2,h3,h4{
        font-family: sans-serif;
    }
    table {
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
      border: 1px solid #ddd;
      font-size: 14px;
    }
    th, td {
      text-align: left;
      padding: 8px;
      border: 1px solid #ddd;
    }
    tr:nth-child(even){background-color: #f2f2f2}
    
    .texto{
      font-size: 12px;
    }
    
    .head {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-right: 10px;
    }

    .titulo{
      margin-left: 95px;
      line-height: 1.5;
      font-size: 13px;
    }
    .subtitulo{
      font-size: 11px;
    }
    
    </style>

</head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <img  class="navbar-brand" src="/img/organizacao.svg" style="margin-left: 10px;padding: 0px 10px;">
      </div>
      <ul class="nav navbar-nav">
        <li ><a href="/dashboard">Inicio</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastros &nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Cadastro de Materias</a>
              <ul class="subMenuColor">
                <li><a href="{{route('materiais.inclusao')}}">Inclusão de Materiais</a></li>
                <li><a href="{{route('materiais.gerenciar')}}">Gerenciar</a></li>
              </ul>
            </li>
            {{-- <li><a href="#">Cadastro de Kit´s</a>
              <ul class="subMenuColor">
                <li><a href="#">Criação de Kit´s</a></li>
                <li><a href="#">Alteração de Kit´s</a></li>
                <li class="divider"></li>
                <li><a href="">Exclusão de Kit´s</a></li>                
              </ul>
            </li> --}}
            <li><a href="#">Cadastro de Grupos</a>
              <ul class="subMenuColor">
                <li><a href="{{route('grupos.inclusao')}}">Inclusão de Grupo</a></li>
                <li><a href="{{route('grupos.gerenciar')}}">Gerenciar</a></li>
              </ul>
            </li>
          </ul>
        </li>

        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Movimentação &nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Material</a>
              <ul class="subMenuColor">
                <li><a href="{{route('entrada.material')}}">Entrada de Material</a></li>
                <li><a href="{{route('saida.material')}}">Saída de Material</a></li>
              </ul>
            </li>
          </ul>
        </li>

        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatorio &nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Material</a>
              <ul class="subMenuColor">                
                <li><a href="{{route('relatorio.entrada')}}">Entrada de Material</a></li>
                <li><a href="{{route('relatorio.materialSaida')}}">Saída de Material</a></li>
                <li class="divider"></li>
                <li><a href="{{route('saida.Localiza')}}">Alterar saída</a></li>
              </ul>
            </li>
            <li><a href="{{route('relatorio.relatorioSimplificado')}}">Estoque</a></li>
          </ul>
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <label style="margin-top: 15px;color: #FFF">
            @auth
              {{ auth()->user()->name }}
            @endauth
          </label>
        </li>

        <li><a>|</a></li>
        <li>
            <form action="{{route('logout')}}" method="POST" style="margin-top: 15px;padding-right: 30px;">
              @csrf
              <a href="/logout" id="sair" onclick="event.preventDefault(); this.closest('form').submit();" style="color: #FFF;text-decoration: none">Sair</a>
            </form>    
        </li>
      </ul>
    </div>
  </nav>
  
  <main>

      <center>
        <button class="btn btn-primary" name="b_print" onClick="printdiv('div_print');">Clique para imprimir</button>
        @if(isset($edit))
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSaida">
            Modificar 
          </button>
        @endif
        @if( $saida->image != 'sem_foto.png')
          <!-- Button trigger modal -->
          <a type="button" class="btn btn-primary" href="/img/assinaturas/{{ $saida->image }}" target="_blank">Ver assinatura</button></a>
        @endif
      </center>

      <hr style="max-width: 50%" />

      <div style="overflow-x:auto;max-width: 50%; margin-left: 25%; padding: 5px 10px 5px 10px !important; border: 1px solid rgb(184, 173, 173);">
      
        <center><img  src="/img/brasao_acre.svg" style="width: 10%"></center>
    
      <div class="head">
        <p style="font-size: 12px">Número de sei: <b>{{ $saida->num_sei }}</b></p>                            
        <p style="font-size: 12px">Grupo: <b>{{ $saida->material->grupo->nome }}</b></p>                  
      </div>
    
      <div class="head">
        <p>
          Destinatário: <b>{{ $saida->destinatario }}</b>
        </p>
        <p>
          Identificador da saída: <b>{{ $saida->id }}</b>
        </p>
        <p>Saída gerada em: <b>{{ date('d/m/y H:i', strtotime($saida->created_at)) }} </b></p>
      </div> 

      <div class="head">
        <p>
          Operação: <b>Saída de material</b></b>
        </p>
        <p>
      </div>
      <hr style="margin-top: 0px">
        <table>
          <thead>
              <tr>
                <th scope="col" style="width: 12%;font-size: 12px"><center>Cód. do material</center></th>
                <th scope="col" style="width: 15%;font-size: 12px">Material</th>            
                <th scope="col" style="width: 12%;font-size: 12px"><center> Quant. Saída (-)</center></th>
                <th scope="col" style="width: 25%;font-size: 12px">Detalhes do material</th>
              </tr>
          </thead>
          <tbody>       
                <tr>                                   
                    <td><center>{{ $saida->material->id }}</center></td>
                    <td>{{ $saida->material->nome }}</td>
                    <td><center>{{ $saida->quant_saida }}</center></td>
                    <td>{{ $saida->material->descricao }}</td>
                </tr>        
          </tbody>
        </table>
        <br />
        <div class="head">
          <p>
            Observação: {{ $saida->observacao }}
        </div>
    
        <div style="margin-top: 30vh">
          <center>
            ▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔
            <br />
            Assinatura</br>
          </center>
        </div>   
    
    </div>
    <br />
  </main>


{{-- DIV IMPRIMIR - INICIO --}}

<div style="overflow-x:auto;display: none;" id="div_print">

  <div class="head">
    <div>
      <div>
        <img src="/img/brasao_acre.svg" style="width: 30%" align="left">
      </div>
      <br />
      <p class="titulo" style="margin-top: -5px"><b>GOVERNO DO ESTADO DO <br />ACRE</b></p>
    </div>
    <p class="subtitulo" align="right">
      SECRETARIA DE ESTADO DE ASSISTÊNCIA SOCIAL, <br />DOS DIREITOS HUMANOS E DE POLÍTICAS PARA AS <br />MULHERES<br />      
    </p>
  </div>

  <p style="font-size: 14px;margin-right: 10px;margin-top: -15px" align="right">
    <b>SEASDHM</b>
  </p>

  <center>
    <img  src="/img/linha.png" style="width: 100%;height: 5px;">
  </center>
  <br />
  <div class="head">
    <p class="texto">Número de sei: <b>{{ $saida->num_sei }}</b></p>
    <p class="texto">Grupo: <b>{{ $saida->material->grupo->nome }}</b></p>
  </div>

  <div class="head">
    <p class="texto">
      Destinatário: <b>{{ $saida->destinatario }}</b>
    </p>
    <p class="texto">
      Identificador da saída: <b>{{ $saida->id }}</b> 
    </p>
    <p class="texto">Saída gerada em: <b>{{ date('d/m/y H:i', strtotime($saida->created_at)) }} </b></p>
  </div> 
  <div class="head">
    <p class="texto">
      Operação: <b>Saída de material</b></b>
    </p>
    <p>
  </div>
  <hr style="margin-top: 0px">
    <table style="font-size: 12px;">
      <thead>
          <tr>
            <th scope="col" style="width: 8%"><center>Cód. do material</center></th>
            <th scope="col" class="texto" style="width: 15%">Material</th>            
            <th scope="col" class="texto" style="width: 10%"><center> Quant. Saída (-)</center></th>
            <th scope="col" class="texto" style="width: 20%">Detalhes do material</th>
          </tr>
      </thead>
      <tbody>       
            <tr>                                   
                <td class="texto"><center>{{ $saida->material->id }}</center></td>
                <td class="texto">{{ $saida->material->nome }}</td>
                <td class="texto"><center>{{ $saida->quant_saida }}</center></td>
                <td class="texto">{{ $saida->material->descricao }}</td>
            </tr>        
      </tbody>
    </table>
    <br />
    <div class="head">
      <p class="texto">
        Observação: {{ $saida->observacao }}
    </div>

    <div style="margin-top: 40vh">
      <center>
        ▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔
        <br />
        Assinatura</br>
      </center>
    </div>
</div>

{{-- Modal de modificar saída - inicio --}}
<div class="modal fade" id="modalSaida" tabindex="-1" role="dialog" aria-labelledby="modalSaidaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 35%;">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" style="max-width: 90%; margin-left: 12px">
          <form action="{{route('saida.update', $saida->id)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf  
            @method('PUT') 
              <label class="form-check-label" for="sei">N° SEI:</label> 
              <input type="text" name="num_sei" id="sei" placeholder="0000.00000.00000/0000-00" value="{{ $saida->num_sei }}" class="form-control" id="sei" value="{{ old('sei') }}" style="margin-top: 10px;">
              <br />
              <label class="form-check-label" for="doc">Adicionar documento assinado:</label> 
              <div class="imageContainer">
                <center><img src="/img/assinaturas/{{ $saida->image }}" alt="Selecione uma imagem" id="imgPhoto" style="max-width: 40%"></center>
              </div>

              <br />
              <input type="file" id="flImage" name="image" accept="image/*">

              <center>
              <button class="btn btn-primary" type="submit">Concluir</button>
              <button class="btn btn-danger" type="reset" data-dismiss="modal">cancelar</button>
            </center>
          </form>              
        </div>
    </div>
  </div>
</div>
{{-- Modal de modificar saída - fim --}}

<script language="javascript">
  function printdiv(printpage) {
      var headstr = "<html><head><title></title></head><body>";
      var footstr = "</body>";
      var newstr = document.all.item(printpage).innerHTML;
      var oldstr = document.body.innerHTML;
      document.body.innerHTML = headstr + newstr + footstr;
      window.print();
      document.body.innerHTML = oldstr;
      return false;
  }
</script>
<script src="/js/uploadImage.js"></script>
<script src="/js/jquery-3.6.0.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/jquery.maskedinput.js" type="text/javascript"></script>

<script type="text/javascript">
  /* Mascaras desejadas pelo ID */
  $(function() {
      $("#sei").mask("9999.99999.99999/9999-99");
  });
</script>

{{-- DIV IMPRIMIR - FIM --}}
    


</body>
</html>