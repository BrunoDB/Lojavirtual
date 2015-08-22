<?php

// retorna o id de usuario logado
function retorne_idusuario_logado(){

// email e senha de cookie
$email = retorne_email_cookie();
$senha = retorne_senha_cookie();

// tabela
$tabela = TABELA_CADASTRO;

// query
$query = "select *from $tabela where email='$email' and senha='$senha';";

// dados
$dados = retorne_dados_query($query);

// id de usuario
$idusuario = $dados['id'];

// retorno
return $idusuario;

};

?>