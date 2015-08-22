<?php

// caminho de pasta
$caminho = $_SERVER['DOCUMENT_ROOT']."/servidor/servidor.php";

// adiciona servidor
include_once($caminho);
include_once(PASTA_PLUGINS_PHP_ARQUIVOS."retorne_lista_todos_arquivos.php");

// carrega dependencias do php
include_once("dependencias.php");

// conecta ao servidor
conecta_mysql(false);

// compila scripts php, css, javascript
include_once("compila_dependencias.php");

// instala banco de dados
include_once("banco/banco.php");

// instala tabelas
include_once("tabelas/tabelas.php");

// instala a ajuda
include_once("instala_ajuda.php");

// instala categorias
include_once("instala_categorias.php");

// mensagem de sucesso
echo "BUSCADOR FUNCIONANDO!";

?>