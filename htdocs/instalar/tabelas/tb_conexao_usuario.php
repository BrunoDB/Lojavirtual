<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "idusuario text, ";
$campos .= "data_conexao text";

// nome de tabela
$nome_tabela = TABELA_CONEXAO_USUARIO;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>