<?php

// detecta tipo de resolucao
function detecta_resolucao_pagina(){

// dados de formulario
$largura_nova = remove_html($_REQUEST['largura']);

// largura atual
$largura_atual = $_SESSION[DETECTOR_SESSAO_TAMANHO_RESOLUCAO];

// inicia a sessao
session_start();

// valida largura atual
if($largura_atual == null){

// atualiza valores
$largura_atual = TAMANHO_RESOLUCAO_PADRAO;
$_SESSION[DETECTOR_SESSAO_TAMANHO_RESOLUCAO] = TAMANHO_RESOLUCAO_PADRAO;

};

// informa se esta usando a resolucao
if($largura_atual < TAMANHO_RESOLUCAO_PADRAO){

$_SESSION[USAR_RESOLUCAO_SISTEMA] = true;

}else{

$_SESSION[USAR_RESOLUCAO_SISTEMA] = false;

};

// valida tamanho atual com novo tamanho
if($largura_nova != $largura_atual){

// atualiza a sessao
$_SESSION[DETECTOR_SESSAO_TAMANHO_RESOLUCAO] = $largura_nova;

// recarregar a pagina
return 1;

}else{

// nao recarrega a pagina
return -1;	
	
};

};

?>