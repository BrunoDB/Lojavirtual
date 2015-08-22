
// notificacoes feeds
function notificacao_feeds(){

// monta requisicao
$.post(v_pagina_acoes, {tipo_pagina_acao: 10}, function(retorno){

if(parseInt(retorno) == -1){

// oculta
document.getElementById("id_notifica_feeds").style.display = "none";

}else{

// exibe e mostra valor
document.getElementById("id_notifica_feeds").style.display = "inline";
document.getElementById("id_notifica_feeds").innerHTML = retorno;

};

});

};

