<?php

// função para validar e-mail
function verifica_se_email_valido($email){

// dados basicos
$conta = "^[a-zA-Z0-9\._-]+@"; // conta
$domino = "[a-zA-Z0-9\._-]+."; // dominio
$extensao = "([a-zA-Z]{2,4})$"; // extensao

// juntando dados
$pattern = $conta.$domino.$extensao;

// retorna se é email
return ereg($pattern, $email);

};

?>
