<?php

// cifra a senha md5
function cifra_senha_md5($senha){

// cifra senha
if($senha != null and strlen($senha) >= TAMANHO_MINIMO_SENHA){
	
$senha = md5($senha);

};

// retorno
return $senha;

};

?>