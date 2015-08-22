<?php

// muda o id de usuario de chat
function mudar_idusuario_chat(){

// dados do formulario
$idusuario = retorne_idusuario_request();

// valida idusuario
if($idusuario == null){

return null;
	
};

// inicia a sessao
session_start();

// atualiza a sessao
$_SESSION[CONFIG_SESSAO_IDUSUARIO_CHAT] = $idusuario;

};

?>