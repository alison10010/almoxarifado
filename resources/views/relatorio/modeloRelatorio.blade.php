<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
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

    .btn-primary {
        color: #fff;
        background-color: #343a40 !important;
        border-color: #343a40 !important;
    }

    .btn {
      display: inline-block;
      margin-bottom: 0;
      font-weight: 400;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      touch-action: manipulation;
      cursor: pointer;
      background-image: none;
      border: 1px solid transparent;
      padding: 6px 12px;
      font-size: 14px;
      line-height: 1.42857143;
      border-radius: 4px;
      user-select: none;
  }

</style>
</head>
<body>

<div style="overflow-x:auto;" id="div_print">

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
    <img  src="/img/linha.png" style="width: 100%;height: 5px;" >
  </center>               
     
  @yield('content') {{-- CONTEUDO DAS PAGINAS --}}


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

<br />
<center><button name="b_print" class="btn btn-primary" onClick="printdiv('div_print');">Imprimir</button></center>

</body>
</html>