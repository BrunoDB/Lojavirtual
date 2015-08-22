<?php

// zera o numero de feeds
function zera_numero_feeds(){

// tabela
$tabela = TABELA_NOTIFICA_FEEDS;

// id de usuario
$idusuario = retorne_idusuario_logado();

// query
$query = "update $tabela set numero_feeds='0' where idusuario='$idusuario';";

// comando executa
comando_executa($query);

};

?>