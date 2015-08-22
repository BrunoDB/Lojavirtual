<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "idusuario text, ";
$campos .= "idioma_usuario text";

// nome de tabela
$nome_tabela = TABELA_IDIOMA_USUARIO;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>