<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "id int not null auto_increment primary key, ";
$campos .= "idusuario text, ";
$campos .= "idamigo text, ";
$campos .= "mensagem text, ";
$campos .= "visualizada text, ";
$campos .= "data text, ";
$campos .= "idusuario_enviou text";

// nome de tabela
$nome_tabela = TABELA_CHAT_USUARIO;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>