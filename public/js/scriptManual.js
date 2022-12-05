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

// PEGA OS DADOS DO FORM E PASSA VIA URL PARA O IFRAME DO RELATORIO
function frameRelatorioEntrada(){

    document.getElementById("frame").classList.remove("frame");

    var form = document.getElementById('signup-form');

    var Material = form.elements['material'];
    var material = Material.value;

    var DataOne = form.elements['dataOne'];
    var dataOne = DataOne.value;

    var DataTwo = form.elements['dataTwo'];
    var dataTwo = DataTwo.value;
    
    var link = '/relatorioEntrada?identificacao='+identificacao+'&material='+material+'&dataOne='+dataOne+'&dataTwo='+dataTwo; 

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



