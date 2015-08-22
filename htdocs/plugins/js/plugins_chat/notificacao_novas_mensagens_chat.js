
// notificacao de novas mensagens de chat
function notificacao_novas_mensagens_chat(){

// monta requisicao
$.post(v_pagina_acoes, {tipo_pagina_acao: 18}, function(retorno){

// valida retorno
if(retorno.length > 0){

document.getElementById("id_notifica_chat").style.display = "block";	
document.getElementById("id_notifica_chat").innerHTML = retorno;

};

// se nao houver mensagens nao respondidas, ocultar
if(retorno == 0){

document.getElementById("id_notifica_chat").style.display = "none";	
	
};

});

};

