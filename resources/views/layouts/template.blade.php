
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
                <li><a href="{{route('relatorio.material')}}">Entrada de Material</a></li>
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
    <div class="container">
      @include('include/msgError')  {{-- MGS DE ERROR NOS FORMULARIOS DE VALIDACAO --}}
      @if(session('msg'))  {{-- VERIFICA SE EXISTE MSG NA SESSÃO --}}
          <div class="alert alert-success" id="alert" role="alert">
              <button type="button" class="close" data-dismiss="alert" onclick="fechaModal()">x</button>
              {{ session('msg') }}
          </div>
      @endif
      @if(session('error'))  {{-- VERIFICA SE EXISTE MSG NA DE ERRO NA SESSÃO --}}
          <div class="alert alert-danger" id="alert" role="alert">
              <button type="button" class="close" data-dismiss="alert" onclick="fechaModal()">x</button>
              {{ session('error') }}
          </div>
      @endif                     
     
      @yield('content') {{-- CONTEUDO DAS PAGINAS --}}
  
    </div>
  </main>

<script src="/js/uploadImage.js"></script>

<script src="/js/scriptManual.js"></script>

</body>
</html>