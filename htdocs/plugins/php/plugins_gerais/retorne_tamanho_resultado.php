<?php

// retorne tamanho de resultado
function retorne_tamanho_resultado($numero_resultados){

// tamanhos disponiveis
$tamanho_mil = 1000;
$tamanho_milhao = 1000000;
$tamanho_bilhao = 1000000000;

// em caso de nulo entao zerar
if($numero_resultados == null){

// zera
$numero_resultados = 0;

};

// retorna valor zero em caso de zero
if($numero_resultados == 0){

return 0;

};

// retorno
$retorno = $numero_resultados;

// calculando
if($numero_resultados >= $tamanho_mil){

$retorno = round($numero_resultados / $tamanho_mil, 2)."k";

};

// calculando
if($numero_resultados >= $tamanho_milhao){

$retorno = round($numero_resultados / $tamanho_milhao, 2)."mi";

};

// calculando
if($numero_resultados >= $tamanho_bilhao){

$retorno = round($numero_resultados / $tamanho_bilhao, 2)."bi";

};

// retorno
return $retorno;

};

?>