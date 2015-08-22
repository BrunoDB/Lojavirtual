
// carrega as mensagens do chat
function carrega_mensagens_chat(){


// monta requisicao
$.post(v_pagina_acoes, {contador: v_contador_chat, tipo_pagina_acao: 15}, function(retorno){

// nao permite duplicatas
if(retorno.length == 0 || retorno == bkp_chat_usuario){

// retorna falso
return false;
	
};

// atualiza o backup
bkp_chat_usuario = retorno;

// atualiza o contador
v_contador_chat += (v_limit_query_chat + 1);

// valida div de produtos
if(document.getElementById("id_div_chat_conversa").innerHTML == null){

// adiciona novo conteudo
document.getElementById("id_div_chat_conversa").innerHTML = retorno;

}else{
	
// adiciona novo conteudo
$(retorno).appendTo('#id_div_chat_conversa');	
	
};


// move scroll para bottom
var objDiv = document.getElementById("id_div_chat_conversa");

// movendo
objDiv.scrollTop = objDiv.scrollHeight;


});


};

