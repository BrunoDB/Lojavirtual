<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "idusuario text, ";
$campos .= "idamigo text, ";
$campos .= "agilidade text, ";
$campos .= "atendimento text, ";
$campos .= "honestidade text, ";
$campos .= "data text";

// nome de tabela
$nome_tabela = TABELA_AVALIAR_PERFIL;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>