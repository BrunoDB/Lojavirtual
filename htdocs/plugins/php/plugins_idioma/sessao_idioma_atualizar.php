<?php

// salva a sessao de idioma de usuario
function sessao_idioma_atualizar(){

// globals
global $idioma_disponivel;

// modo de idioma
$modo = remove_html($_REQUEST['modo']);

// inicia a sessao
session_start();

// tipo de idioma
switch($modo){

case 1:
$idioma_selecionado = $idioma_disponivel[0];
break;

case 2:
$idioma_selecionado = $idioma_disponivel[1];
break;

default:
$idioma_selecionado = $idioma_disponivel[0];

};

// salva o idioma na sessao
$_SESSION[IDENTIFICADOR_SESSAO_IDIOMA] = $idioma_selecionado;

// valida usuario logado
if(retorne_usuario_logado() == false){

// retorno nulo
return null;
	
};

// tabela
$tabela = TABELA_IDIOMA_USUARIO;

// id de usuario logado
$idusuario = retorne_idusuario_logado();

// querys
$query[] = "delete from $tabela where idusuario='$idusuario';";
$query[] = "insert into $tabela values('$idusuario', '$idioma_selecionado');";

// executador de querys
executador_querys($query);

};

?>