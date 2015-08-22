
// seta nova mensagem usuario de chat
function seta_nova_mensagem_usuario_chat(idamigo){

// monta requisicao
$.post(v_pagina_acoes, {idamigo: idamigo, tipo_pagina_acao: 19}, function(retorno){

// valida retorno
if(parseInt(retorno) > 0){
	
document.getElementById("id_notificacao_nova_mensagem_usuario_" + idamigo).style.display = "block";
document.getElementById("id_notificacao_nova_mensagem_usuario_" + idamigo).innerHTML = retorno;

}else{
	
document.getElementById("id_notificacao_nova_mensagem_usuario_" + idamigo).style.display = "none";
	
};

});

};

