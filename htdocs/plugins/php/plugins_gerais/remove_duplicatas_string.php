<?php

// remove as duplicatas em string
function remove_duplicatas_string($conteudo, $separador){

// remove duplicatas
$conteudo = implode("$separador", array_unique(explode("$separador", $conteudo)));;

// retorno
return $conteudo;

};

?>