<?php

// retorna o id de usuario de chat
function retorne_idusuario_chat(){

// inicia a sessao
session_start();

// retorno
return $_SESSION[CONFIG_SESSAO_IDUSUARIO_CHAT];

};

?>