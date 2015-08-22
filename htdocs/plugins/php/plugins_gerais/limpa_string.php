<?php

// limpa string
function limpa_string($string_limpar, $modo){

// seleciona modo
switch($modo){

case 1:
// remove simbolos
return preg_replace("/[^a-zA-Z0-9\s]/", "", $string_limpar);
break;

case 2:
// remove simbolos, incluindo espacos vazios
return preg_replace("/[^a-zA-Z0-9]/", "", $string_limpar);
break;

case 3:
// remove simbolos e numeros
return preg_replace("/[^a-zA-Z\s]/", "", $string_limpar);
break;

case 4:
// remove letras e simbolos
return preg_replace("/[^0-9\s]/", "", $string_limpar);
break;

};

};

?>