@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Saída de Material') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<div class="card linha" style="margin-top: 4rem;width: 60%; margin-left: 25%">
  <h4>Saída de Material</h4>
  <br />
  <div class="row">   
    <form action="{{route('saida.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
      @csrf  
      @method('POST')                   
      
      <div class="form-inline" style="margin-left: 12px;">
        Quantidade de saída:
        <input type="number" name="quant_saida" placeholder="Quantidade de saída" title="Quantidade Atual" class="form-control" id="saida" style="width:200px" min="1" max="{{$material->estoque_atual}}" required>
      </div>
      <br />

      <div class="form-inline" style="margin-left: 12px;">  
        <label class="form-check-label" for="especifico">Possui número de SEI:</label>
        <select id="seiCampo" onchange="seiCampoSelect()" class="form-control" style="width:170px;" name="possui_sei">
          <option value="Nao">Não</option>
          <option value="Sim">Sim</option>
        </select>
      </div> 

      <div class="form-check" style="margin-left: 12px;margin-top: 10px;display: none" id="campo_sei">
        <input type="radio" class="form-check-input" id="seiTrue" name="num_sei" value="seiTrue" onclick="seiOpcao('seiTrue')" checked>
        <label class="form-check-label" for="seiTrue">Adicionar SEI agora</label>
        &nbsp;&nbsp;
        <input type="radio" class="form-check-input" id="seiFalse" name="num_sei" value="seiFalse" onclick="seiOpcao('seiFalse')">
        <label class="form-check-label" for="seiFalse">Adicionar SEI depois</label>             
      </div>

      <div class="form-group" style="margin-left: 12px;">
        <input type="text" name="num_sei" placeholder="0000.00000.00000/0000-00" class="form-control" id="sei" value="{{ old('sei') }}" style="max-width: 340px;margin-top: 10px;display: none">
      </div>

      <div class="form-group" style="margin-left: 12px;">
        <label for="nome">Destinatário:</label>
        <input type="txt" class="form-control" id="destinatario" name="destinatario" placeholder="Destinatário de saída" required value="{{ old('destinatario') }}" style="width:340px">
      </div>

      <div class="form-group" style="margin-left: 12px;">        
        <label class="form-check-label" for="Observações">Observações:</label> 
        <textarea name="observacao" id="observacao" class="form-control" placeholder="Observações da saída" style="resize: none;width:340px"></textarea>
      </div>
 
      <hr >
      <div class="modal-lado">
        <div class="form-inline especamento">
          Material: <label>{{$material->nome}}</label>          
        </div>
    
        <div class="form-inline especamento">
            Em estoque : <label>{{$material->estoque_atual}}</label> 
        </div>
        
        <div class="form-inline especamento">
          Grupo: <label>{{$material->grupo->nome}}</label> 
        </div>

        <div class="form-group especamento">
          Descrição do material: <label>{{$material->descricao}}</label> 
        </div>        

        <input type="hidden" name="material_id" value="{{$material->id}}">

        <button type="submit" class="btn btn-primary">Gerar saída</button>

        <a type="button" class="btn btn-danger" href="{{ route('saida.material') }}">Cancelar</button></a>
      </div>

      <div class="modal-lado">
        <div class="max-width">
          <div class="imageContainer"> 
            <img src="/img/materiais/{{$material->image}}" alt="Material" id="imgPhoto">
          </div>
      </div>



    </form>
  </div>
</div> 
  
</div>

<script src="/js/jquery-3.6.0.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/jquery.maskedinput.js" type="text/javascript"></script>

<script type="text/javascript">
  /* Mascaras desejadas pelo ID */
  $(function() {
      $("#sei").mask("9999.99999.99999/9999-99");
  });
</script>

@endsection  {{-- CONTEUDO DA PAGE - FIM --}}