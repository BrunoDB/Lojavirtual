
// exibe dialogo historico de mensagens antigas de chat
function exibir_historico_chat_dialogo(){

// procedimentos a serem iniciados com o dialogo
procedimentos_inicia_dialogo();

// limpa backup de historico antigo de chat
v_backup_historico_antigo_chat = "";

// zera contador de avanco de historico
v_contador_avanco_hist_chat = 0;

// exibe div com conteudo
document.getElementById("id_janela_dialogo_historico_mensagens_chat_atual").style.display = "inline";

// apaga mensagens antigas
document.getElementById("id_div_historico_mensagens_chat").innerHTML = "";

// carrega o historico de convesas de chat
carrega_historico_conversa_chat();

};

