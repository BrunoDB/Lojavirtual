<?php

// salva cookies de login
function salvar_cookies($email, $senha, $limpa){

// salva na sessao
session_start();

// tempo de validade do cookie
$tempo_vida = time() + (COOKIES_DIAS_EXISTE * 24 * 3600);

// salvando valor de cookie
setcookie(CONFIG_NOME_COOKIE_EMAIL, $email, $tempo_vida, "/");
setcookie(CONFIG_NOME_COOKIE_SENHA, $senha, $tempo_vida, "/");

// salva o email e a senha na sessao
$_SESSION[CONFIG_NOME_COOKIE_EMAIL] = $email;
$_SESSION[CONFIG_NOME_COOKIE_SENHA] = $senha;

// limpa a sessao de cookies
if($limpa == true){

// limpa array de sessao
$_SESSION = array();

// destroe a sessao
session_destroy();

};

};

?>
