<?php

// retorna o id de usuario por email
function retorne_idusuario_email($email){

// tabela
$tabela = TABELA_CADASTRO;

// query
$query = "select *from $tabela where email='$email';";

// dados
$dados = retorne_dados_query($query);

// separa dados
$idusuario = $dados['id'];

// retorno
return $idusuario;

};

?>