<?php

// remove as linhas em branco
function remove_linhas_branco($conteudo){

// retorno
return preg_replace('/\n\s*\n/', "\n", $conteudo);

};

?>