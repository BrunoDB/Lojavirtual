<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "idusuario text, ";
$campos .= "imagem_perfil text, ";
$campos .= "imagem_perfil_miniatura text, ";
$campos .= "nome text, ";
$campos .= "email text, ";
$campos .= "cnpj text, ";
$campos .= "endereco text, ";
$campos .= "cidade text, ";
$campos .= "estado text, ";
$campos .= "telefone text, ";
$campos .= "celular text, ";
$campos .= "site text, ";
$campos .= "categoria text, ";
$campos .= "sobre text, ";
$campos .= "cep text, ";
$campos .= "data text";

// nome de tabela
$nome_tabela = TABELA_PERFIL;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>