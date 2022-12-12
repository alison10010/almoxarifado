<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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


.head {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-right: 10px;
}

</style>
</head>
<body>

<div style="overflow-x:auto;">

  <center><img  class="navbar-brand" src="/img/brasao_acre.svg" style="width: 10%"></center>

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
    <hr>
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

    <div style="margin-top: 40vh">
      <center>
        ▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔
        <br />
        Assinatura</br>
      </center>
    </div>



</div>

</body>
</html>