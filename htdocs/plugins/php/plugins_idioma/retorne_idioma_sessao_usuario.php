<?php

// retorna o idioma da sessao do usuario logado
function retorne_idioma_sessao_usuario(){

// inicia a sessao
session_start();

// retorno
return $_SESSION[IDENTIFICADOR_SESSAO_IDIOMA];

};

?>