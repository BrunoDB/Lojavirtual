<?php

// define o timezone
date_default_timezone_set("America/Sao_Paulo");

// dados do servidor
define("URL_SERVIDOR", "http://".$_SERVER['SERVER_NAME']);
define("PASTA_ROOT_SERVIDOR", $_SERVER['DOCUMENT_ROOT']);
define("IDENTIFICADOR_SESSAO_IDIOMA", md5("identificador_sessao_idioma"));

// idiomas disponiveis
$idioma_disponivel[0] = "pt_br";
$idioma_disponivel[1] = "us_ingles";

// href idioma
$seletor_idioma_href = "href_idioma";

// inicia a sessao
session_start();

// mysql do servidor
include_once("mysql.php");

// logotipo
include_once("logotipo_sistema.php");

// campos requestes
include_once("campos_requestes.php");

// pastas e localizacoes
include_once("pastas_sistema.php");

// arquivos de sistema
include_once("arquivos_sistema.php");

// extensoes
include_once("extensoes.php");

// banco de dados
include_once("banco_dados.php");

// tipos de paginas
include_once("tipo_paginas.php");

// paginas do site
include_once("paginas_site.php");

// configuracoes de perfil
include_once("configuracoes_perfil.php");

// variaveis gerais
include_once("variaveis_gerais.php");

// configuracoes do php
include_once("configuracoes_sistema.php");

// termos e privacidade
include_once("termos_privacidade_pt_br.php");

// seletor de idiomas
include_once("seletor_idioma.php");

// paginas hrefs
include_once("paginas_hrefs.php");

?>