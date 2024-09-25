async function carregar_servico(valor){
    if(valor.length >= 3){
        console.log("Pesquisar:" + valor);

     const dados = await fetch('listar_servico.php?nome= '+ valor);
     const resposta = await dados.json();

     console.log(resposta);

     var html ="<ul clas='list-group position-fixed'>";

    if(resposta['erro']){
        html += "<li class='list-group-item disabled'>" +resposta ['msg'] + "</li>";
    }else {
        for(i = 0; i < resposta['dados'].length; i++){
        html +="<li class='list-group-item list-group-item-action'onlick='get_id_servico("+ resposta ['dados'][i].idTipoServico + "," + JSON.stringify + ")'>" + resposta ['dados'][i].nomeServico + "</li>";    
        }

    }
    }
     html +="</ul>";

     document.getElementById('resultado_pesquisa').innerHTML = html;
    }
function get_id_servico(idTipo_Servico, nome){
    console.log("Tipo de Servico: " + idTipoServico);
    console.log("Nome do Servico: " + nomeServico);
    DocumentType.getElementById("servico").value = nomeServico;
}

const fechar = document.getElementById('servico');
document.addEventListener('click', function(event){
const validar_clique= fechar.contains(event.target);
if(!validar_clique){
    document.getElementById('resultado_pesquisa').innerHTML = '';
}
});