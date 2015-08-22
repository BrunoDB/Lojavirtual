<?php

// nome do banco de dados
$banco_dados = BANCO_DADOS;

// query
$query = "create database $banco_dados DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;";

// query executa
query_executa($query);

// seleciona banco de dados
seleciona_banco($banco_dados);

?>