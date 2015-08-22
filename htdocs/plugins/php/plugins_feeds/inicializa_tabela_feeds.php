<?php

// inicializa a tabela de feeds
function inicializa_tabela_feeds(){

// tabela
$tabela = TABELA_NOTIFICA_FEEDS;

// id de usuario
$idusuario = retorne_idusuario_logado();

// query
$query = "select *from $tabela where idusuario='$idusuario';";

// numero de linhas
$numero_linhas = retorne_numero_linhas_query($query);

// verifica se a tabela ja possui registros
if($numero_linhas == 0){

// numero de feeds
$numero_feeds_usuario = retorne_numero_feeds();

// data atual
$data = data_atual();

// query
$query = "insert into $tabela values('$idusuario', '$numero_feeds_usuario', '$data');";	

};

// comando executa
comando_executa($query);

};

?>