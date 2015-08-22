<?php

// converte codigo para emoticon
function converte_codigo_emoticon($conteudo){

// prefixo do emoticon
$prefixo_emoticon = PREFIXO_EMOTICON;

// constroe emoticons
for($contador == $contador; $contador <= NUMERO_EMOTICONS_ATUAL; $contador++){

$conteudo = str_replace("$prefixo_emoticon ($contador)", "<img src='".PASTA_IMAGENS_SISTEMA."$prefixo_emoticon ($contador)".".png' title='$prefixo_emoticon ($contador)' class='classe_emoticon_usuario'>", $conteudo);

};

// retorno
return $conteudo;

};

?>