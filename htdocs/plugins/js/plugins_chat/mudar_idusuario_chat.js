
// muda o id de usuario de chat
function mudar_idusuario_chat(idusuario){


// monta requisicao
$.post(v_pagina_acoes, {uid: idusuario, tipo_pagina_acao: 13}, function(retorno){


// limpa variaveis
bkp_chat_usuario = "";
v_estado_lixeira_bkp = "";

// zera o contador do chat
v_contador_chat = -v_limit_query_chat;

// limpa mensagens antigas
document.getElementById("id_div_chat_conversa").innerHTML = "";

// move o foco novamente
document.getElementById("id_campo_escrever_mensagem").focus();

});


};

