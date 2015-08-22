<?php

// retorna o usuario logado
function retorne_usuario_logado(){

// email e senha de cookie
$email = retorne_email_cookie();
$senha = retorne_senha_cookie();

// tabela
$tabela = TABELA_CADASTRO;

// query
$query = "select *from $tabela where email='$email' and senha='$senha';";

// numero de linhas
if(retorne_numero_linhas_query($query) == 1 and $email != null and $senha != null){

// usuario logado
return true;

}else{

// usuario nao logado
return false;	
	
};

};

?>