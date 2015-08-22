<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "id int not null auto_increment primary key, ";
$campos .= "idusuario text, ";
$campos .= "idalbum text, ";
$campos .= "titulo text, ";
$campos .= "descricao text, ";
$campos .= "quantidade text, ";
$campos .= "parcelamento text, ";
$campos .= "juros text, ";
$campos .= "preco text, ";
$campos .= "categoria text, ";
$campos .= "data text";

// nome de tabela
$nome_tabela = TABELA_PRODUTO;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>