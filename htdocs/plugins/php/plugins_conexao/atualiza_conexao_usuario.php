<?php

// atualiza a conexao do usuario
function atualiza_conexao_usuario(){

// tabela
$tabela = TABELA_CONEXAO_USUARIO;

// id de usuario logado
$idusuario = retorne_idusuario_logado();

// data de conexao
$data_conexao = retorne_data_atual_conexao();

// query
$query[] = "delete from $tabela where idusuario='$idusuario';";
$query[] = "insert into $tabela values('$idusuario','$data_conexao');";

// comando
if($idusuario != null){

executador_querys($query);

};

};

?>