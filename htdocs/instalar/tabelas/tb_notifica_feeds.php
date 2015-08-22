<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "idusuario text, ";
$campos .= "numero_feeds text, ";
$campos .= "data text";

// nome de tabela
$nome_tabela = TABELA_NOTIFICA_FEEDS;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>