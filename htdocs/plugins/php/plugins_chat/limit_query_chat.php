<?php

// limit de query de chat
function limit_query_chat(){

// valor de contador
$contador = remove_html($_REQUEST['contador']);

// limitador de conteudo
if($contador <= 0){

// inicio
$limit_chat = CONFIG_LIMIT_CHAT_INICIO;

}else{

// carregando novas
$limit_chat = CONFIG_LIMIT_CHAT;	

};

// limit
if($contador <= 0){
	
$limit_query = "order by id asc limit $limit_chat";

}else{
	
$limit_query = "order by id desc limit $limit_chat";

};

// retorno
return $limit_query;

};

?>