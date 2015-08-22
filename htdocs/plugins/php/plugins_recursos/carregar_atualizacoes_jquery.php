<?php

// atualizacoes javascript que devem iniciar com a pagina
function carregar_atualizacoes_jquery(){

// globals
global $idioma;

// valida usuario logado
if(retorne_usuario_logado() == false){
	
return null;
	
};

// tempo de timer
$tempo_timer = CONFIG_TIMER;

// campos notificacoes
$campos_notificacoes = "
\n
notificacao_feeds();
\n
";

// campo conexao de usuario
$campo_conexao_usuario = "
\n
atualiza_conexao_usuario();
\n
";

// campo chat
if(retorne_href_get() == $idioma[81]){
	
$campo_chat = "
\n
carrega_mensagens_chat();
\n
";

};

// campo resolucao
$campo_resolucao = "
\n
detecta_resolucao_pagina();
\n
";

// codigo html
$codigo_html .= "
<script>
\n
var variavelTempoAtualizador = setInterval(function(){ AtualizadorTimer() }, $tempo_timer);
\n
function AtualizadorTimer() {
\n
carregar_atualizacoes_jquery();
\n
};
\n
\n
function carregar_atualizacoes_jquery(){
\n

// codigos aqui ::::
$campos_notificacoes
$campo_conexao_usuario
$campo_chat
$campo_resolucao

// codigos aqui ::::
estado_lixeira();
notificacao_novas_mensagens_chat();
atualizacoes_chat_usuario();


// codigos aqui ::::


// ::::

\n
};
\n
</script>
\n
";

// retorno
return $codigo_html;

};

?>