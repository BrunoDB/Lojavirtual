<?php

// aplica o idioma do usuario
function aplica_idioma_usuario($idusuario){

// tabela
$tabela = TABELA_IDIOMA_USUARIO;

// query
$query = "select *from $tabela where idusuario='$idusuario';";

// dados
$dados = retorne_dados_query($query);

// separa dados
$idioma_usuario = $dados['idioma_usuario'];

// idioma atual do sistema
$idioma_atual_sistema = retorne_idioma_sessao_usuario();

// valida idioma usuario
if($idioma_usuario != null and $idioma_atual_sistema != $idioma_usuario){

// inicia a sessao
session_start();

// aplica o idioma
$_SESSION[IDENTIFICADOR_SESSAO_IDIOMA] = $idioma_usuario;

};

};

?>