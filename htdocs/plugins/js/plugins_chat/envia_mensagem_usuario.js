
// envia a mensagem para o usuario
function envia_mensagem_usuario(){

// dados de formulario
mensagem = document.getElementById("id_campo_escrever_mensagem").value;

// valida tamanho mensagem
if(mensagem.length == 0){

return false;
	
};

// monta requisicao
$.post(v_pagina_acoes, {mensagem: mensagem, tipo_pagina_acao: 14}, function(retorno){


// limpa campo de mensagem
document.getElementById("id_campo_escrever_mensagem").value = "";

// move o foco novamente
document.getElementById("id_campo_escrever_mensagem").focus();


});


// carrega as mensagens do chat
carrega_mensagens_chat();
	
};

