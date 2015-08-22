<?php

// retorna usar resolucao
function retorna_usar_resolucao(){

// inicia a sessao
session_start();

// retorno
return $_SESSION[USAR_RESOLUCAO_SISTEMA];

};

?>