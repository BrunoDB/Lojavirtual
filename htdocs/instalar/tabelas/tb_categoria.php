<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "id int not null auto_increment primary key, ";
$campos .= "categoria text, ";
$campos .= "idioma text";

// nome de tabela
$nome_tabela = TABELA_CATEGORIAS;

// query
$query[] = "drop table $nome_tabela;";
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>