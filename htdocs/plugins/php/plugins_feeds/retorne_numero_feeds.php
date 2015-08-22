<?php

// retorna o numero de feeds
function retorne_numero_feeds($idusuario){

// tabela
$tabela = TABELA_NOTIFICA_FEEDS;

// idusuario logado
if($idusuario == null){

// obtem id de usuario logado
$idusuario = retorne_idusuario_logado();

};

// query
$query = "select *from $tabela where idusuario='$idusuario';";

// dados
$dados = retorne_dados_query($query);

// numero de feeds
$numero_feeds = $dados['numero_feeds'];

// valida numero de feeds
if($numero_feeds == null){

// zera numero de feeds
$numero_feeds = -1;

};

// retorno
return $numero_feeds;

};

?>