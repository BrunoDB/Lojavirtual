<?php

// seta se o usuario do chat esta online
function seta_usuario_chat_online(){

// id de usuario
$idusuario = retorne_idusuario_request();

// imagem online
$imagem_online = retorne_imagem_servidor(16);

// valida usuario online
if(retorne_usuario_online($idusuario) == true){

// codigo html
$codigo_html = "
$imagem_online
";
	
}else{
	
// codigo html
$codigo_html = null;

};

// retorno
return $codigo_html;

};

?>