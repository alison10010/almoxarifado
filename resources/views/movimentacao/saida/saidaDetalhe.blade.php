
<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
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
      font-size: 12px;
    }
    th, td {
      text-align: left;
      padding: 8px;
      border: 1px solid #ddd;
    }
    tr:nth-child(even){background-color: #f2f2f2}
    
    .texto{
      font-size: 11px;
    }
    
    .head {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-right: 10px;
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
                <li><a href="{{route('relatorio.material')}}">Entrada de Material</a></li>
                <li><a href="#">Saída de Material</a></li>
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

      <center><button class="btn btn-primary" name="b_print" onClick="printdiv('div_print');">Clique para imprimir</button></center>

      <br />

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
        <p>Saída gerada em:<b> @php echo date('d/m/Y H:i'); @endphp </b></p>
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
                <th scope="col" style="width: 8%"><center>Cód. do material</center></th>
                <th scope="col" style="width: 15%">Material</th>            
                <th scope="col" style="width: 8%"><center> Quant. Saída (-)</center></th>
                <th scope="col" style="width: 20%">Detalhes do material</th>
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

  <center><img src="/img/brasao_acre.svg" style="width: 10%"></center>

  <br />

  <div class="head">
    <p style="font-size: 12px">Número de sei: <b>{{ $saida->num_sei }}</b></p>                            
    <p style="font-size: 12px">Grupo: <b>{{ $saida->material->grupo->nome }}</b></p>                  
  </div>

  <div class="head" style="font-size: 12px;">
    <p>
      Destinatário: <b>{{ $saida->destinatario }}</b>
    </p>
    <p>
      Identificador da saída: <b>{{ $saida->id }}</b>
    </p>
    <p>Saída gerada em:<b> @php echo date('d/m/Y H:i'); @endphp </b></p>
  </div> 
  <div class="head">
    <p>
      Operação: <b>Saída de material</b></b>
    </p>
    <p>
  </div>
  <hr style="margin-top: 0px">
    <table style="font-size: 12px;">
      <thead>
          <tr>
            <th scope="col" style="font-size: 12px;width: 8%"><center>Cód. do material</center></th>
            <th scope="col" style="font-size: 12px;width: 15%">Material</th>            
            <th scope="col" style="font-size: 12px;width: 10%"><center> Quant. Saída (-)</center></th>
            <th scope="col" style="font-size: 12px;width: 20%">Detalhes do material</th>
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
      <p style="font-size: 12px">
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

{{-- DIV IMPRIMIR - FIM --}}
    


</body>
</html>