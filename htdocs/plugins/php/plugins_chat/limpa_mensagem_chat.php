<?php

// limpa a mensagem de chat
function limpa_mensagem_chat(){

// tabela
$tabela = TABELA_CHAT_USUARIO;

// id de usuario logado
$idusuario = retorne_idusuario_logado();

// idamigo
$idamigo = retorne_idusuario_chat();

// dados de formulario
$modo = remove_html($_REQUEST['modo']);

// query
if($modo == 1){
	
$query = "delete from $tabela where idusuario='$idusuario';";

}else{

$query = "delete from $tabela where idusuario='$idusuario' and idamigo='$idamigo';";

};

// executa query
query_executa($query);

};

?>