<?php

// caminho de pasta
$caminho = $_SERVER['DOCUMENT_ROOT']."/servidor/servidor.php";

// adiciona servidor
include_once($caminho);

// carrega dependencias php
include_once(ARQUIVO_PHP);

// conecta ao mysql e seleciona banco de dados
conecta_mysql(true);

// monta a pagina
echo monta_pagina();

?>