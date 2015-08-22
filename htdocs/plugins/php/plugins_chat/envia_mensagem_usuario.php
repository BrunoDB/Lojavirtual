<?php

// envia a mensagem para o usuario
function envia_mensagem_usuario(){

// dados de formulario
$mensagem = remove_html($_REQUEST['mensagem']);

// id de usuario da sessao
$idamigo = retorne_idusuario_chat();

// id de usuario logado
$idusuario = retorne_idusuario_logado();

// valida campos
if($mensagem == null or $idamigo == null or $idusuario == null){

// retorno nulo
return null;
	
};

// tabela
$tabela = TABELA_CHAT_USUARIO;

// data
$data = data_atual();

// query
$query[] = "insert into $tabela values(null, '$idusuario', '$idamigo', '$mensagem', '1', '$data', '$idusuario');";
$query[] = "insert into $tabela values(null, '$idamigo', '$idusuario', '$mensagem', '0', '$data', '$idusuario');";
$query[] = "update $tabela set visualizada='1' where idusuario='$idusuario' and idamigo='$idamigo';";

// comando executa
executador_querys($query);

};

?>