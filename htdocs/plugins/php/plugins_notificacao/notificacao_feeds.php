<?php

// notificacao de feeds
function notificacao_feeds(){

// inicializa a tabela de feeds
inicializa_tabela_feeds();

// numero de feeds
$numero_feeds = retorne_numero_feeds(null);

// valida numero de feeds
if($numero_feeds == 0){

$numero_feeds = -1;
	
};

// retorno
return $numero_feeds;

};

?>