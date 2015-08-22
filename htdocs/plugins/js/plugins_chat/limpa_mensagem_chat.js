
// limpa a mensagem de chat
function limpa_mensagem_chat(modo){

// monta requisicao
$.post(v_pagina_acoes, {modo: modo, tipo_pagina_acao: 16}, function(retorno){


// limpa variaveis
bkp_chat_usuario = "";
v_estado_lixeira_bkp = "";

// limpa mensagens antigas
document.getElementById("id_div_chat_conversa").innerHTML = "";

// executa o som
executa_som(1);

});

// fecha janela de dialogo
fechar_janela_mensagem_dialogo();

};

