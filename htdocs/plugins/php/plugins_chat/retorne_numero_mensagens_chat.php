<?php

// retorna o numero de mensagens de chat
function retorne_numero_mensagens_chat($modo){

// modo true retorna todos os registros
// modo false retorna apenas novas mensagens

// tabela
$tabela = TABELA_CHAT_USUARIO;

// id de usuario logado
$idusuario = retorne_idusuario_logado();

// query
if($modo == true){
	
$query = "select *from $tabela where idusuario='$idusuario';";

}else{

$query = "select *from $tabela where idusuario='$idusuario' and visualizada='0';";

};

// retorno
return retorne_numero_linhas_query($query);

};

?>