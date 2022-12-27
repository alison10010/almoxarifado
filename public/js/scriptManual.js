// FECHA MODAL
function fechaModal(){
    document.getElementById("alert").classList.toggle("fechar");
}

// BUSCA DETALHES DO MATERIAL
function detalhesMaterial(id){ 
    $.ajax({
    url: '/materiais/detalhes/'+id, // LOCAL DA BUSCA DA LISTA NO BANCO
    success: function(retorno){
        var material = JSON.parse(retorno); 
        $("#p-nome").text(material.nome);
        $("#p-quant_inicial").text(material.user_id);
        $("#p-estoque_atual").text(material.estoque_atual);
        $("#p-estoque_minimo").text(material.estoque_minimo);
        $("#p-status").text(material.status);
        $("#p-descricao").text(material.descricao);
        $('#p-image').html('<img src="/img/materiais/' + material.image  + '" style="width: 100%" height="310px" />');
        $("#p-user_id").text(material.user_id);
        $("#p-grupo_id").text(material.grupo_id);
        $("#detalheFunc").modal("show");
    }
    });
} 

// MOSTRA CAMPO PARA RELATORIO DE MOVIMENTACAO ESPECIFICO
function buscaMaterial(opcao){

    const myElement = document.getElementById("material");

    if(opcao === 'idendificador'){
        myElement.type = 'number';
        myElement.placeholder = "Digite a Identificação";
    }

    if(opcao === 'NomeMat'){
        myElement.type = 'txt';
        myElement.placeholder = "Digite o nome do material";
    }   
}

// MOSTRA CAMPO PARA RELATORIO DE SAIDA ESPECIFICO
function saidaMaterial(opcao){

    if(opcao === 'todos'){
        document.getElementById("buscaMaterial").style.display = "none";
        document.getElementById("material").value = "";
    }
    if(opcao === 'especifico'){
        document.getElementById("buscaMaterial").style.display = "block";
    } 

}

// ENTRADA DE MATERIAL
function entradaModal(id){ 
    $.ajax({
        url: '/materiais/detalhes/'+id, // LOCAL DA BUSCA DA LISTA NO BANCO
        success: function(retorno){
            var material = JSON.parse(retorno); 
            document.getElementById('p-id').value= material.id;
            $("#p-nome").text(material.nome);
            $("#entradaModal").modal("show");
        }
    });
}

// MOSTRA CAMPO PARA RELATORIO DE ENTRADA ESPECIFICA

var identificacao = false;

function relatorioOpcao(opcao)
{
    document.getElementById('material').value='';
    if(opcao === 'todos'){
        document.getElementById("material").style.display = "none";
        identificacao = false;
    }
    if(opcao === 'especifico'){
        document.getElementById("material").style.display = "block";
        identificacao = true;
    }    
}

// PEGA OS DADOS DO FORM E PASSA VIA URL PARA O IFRAME DE ENTRADA
function frameRelatorioEntrada(){

    document.getElementById("frame").classList.remove("frame");

    var form = document.getElementById('signup-form');

    var Material = form.elements['material'];
    var material = Material.value;

    var DataOne = form.elements['dataOne'];
    var dataOne = DataOne.value;

    var DataTwo = form.elements['dataTwo'];
    var dataTwo = DataTwo.value;
    
    var link = '/relatorio/entrada?identificacao='+identificacao+'&material='+material+'&dataOne='+dataOne+'&dataTwo='+dataTwo; 

    document.getElementById('frame').src = link;
}

// PEGA OS DADOS DO FORM E PASSA VIA URL PARA O IFRAME DE SAIDA
function frameRelatorioSaida(){

    document.getElementById("frame").classList.remove("frame");

    var form = document.getElementById('signup-form');

    var Saida = form.elements['opcaoSaida'];
    var saida = Saida.value;

    var Material = form.elements['material'];
    var material = Material.value;

    var DataOne = form.elements['dataOne'];
    var dataOne = DataOne.value;

    var DataTwo = form.elements['dataTwo'];
    var dataTwo = DataTwo.value;
    
    var link = '/relatorio/saida?opcaoSaida='+saida+'&material='+material+'&dataOne='+dataOne+'&dataTwo='+dataTwo; 

    document.getElementById('frame').src = link;
}

// ESTOQUE RESUMIDO
function frameResumoEstoque(){

    var form = document.getElementById('signup-form');

    var Opcao = form.elements['opcao'];
    var opcao = Opcao.value;

    document.getElementById("frame").classList.remove("frame");
    var link = '/relatorio/relatorioResumoEstoquePDF?opcao='+opcao; 
    document.getElementById('frame').src = link;
}


// MOSTRA CAMPO PARA NUMERO DE SEI DA SAIDA DE MATERIAL
function seiCampoSelect() {
    var x = document.getElementById("seiCampo").value;
    if(x === 'Nao'){
        document.getElementById("campo_sei").style.display = "none";
        document.getElementById("sei").style.display = "none";
    }
    if(x === 'Sim'){
        document.getElementById("campo_sei").style.display = "block";
        document.getElementById("sei").style.display = "block";
    } 
}

function seiOpcao(opcao)
{
    document.getElementById('sei').value='';
    if(opcao === 'seiFalse'){
        document.getElementById("sei").style.display = "none";
        identificacao = false;
    }
    if(opcao === 'seiTrue'){
        document.getElementById("sei").style.display = "block";
        identificacao = true;
    }    
}



