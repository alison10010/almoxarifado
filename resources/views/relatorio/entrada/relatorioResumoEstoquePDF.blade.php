<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

p{
    font-size: 13px;
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
        <p style="font-size: 14px"><b>Relatório de estoque</b></p>
        <p>
            @php
                echo date('d/m/Y H:i'); 
            @endphp
        </p>
  </div>

    @if(isset($entrada['totalGeral']))
        <p>Total geral de material: {{$entrada['totalGeral']}}</p>
    @endif
<hr>
    <table>
      <thead>
          <tr>
            <th scope="col" style="width: 10%"><center>Identificação</center></th>
            <th scope="col" style="width: 15%">Nome do Material</th>            
            <th scope="col" style="width: 10%"><center>Estoque Atual</center></th>
            <th scope="col" style="width: 10%"><center>Estoque mínimo</center></th>
          </tr>
      </thead>
      <tbody>       
        @if(isset($entrada['material'])) 
          @foreach ($entrada['material'] as $lista)
              <tr style="background: {{ $lista->estoque_atual > $lista->estoque_minimo ? '' : '#ff00003d' }};">                   
                <td><center>{{ $lista->id }}</center></td> 
                <td>{{ $lista->nome }}</td>        
                <td><center>{{ $lista->estoque_atual }}</center></td>            
                <td><center>{{ $lista->estoque_minimo }}</center></td>            
              </tr>
          @endforeach
        
      </tbody>
    </table>
          @if(count($entrada['material']) == 0)
              <p style="color: red">Não foi encontrado relatório de estoque.</p>
          @endif
        @endif


</div>

</body>
</html>