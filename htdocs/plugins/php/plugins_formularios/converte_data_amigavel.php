<?php


// converte data numero para amigavel 
function converte_data_amigavel($data){

// globals
global $semana_idioma;
global $mes_extenso_idioma;
global $idioma;

// valida data
if($data == null){

return null;

};

// obtendo dados de array de data
$data_explode = explode("-", $data); 

// valida dia, mes, ano
if($data_explode[0] == null or $data_explode[1] == null or $data_explode[2] == null){

return null;

};

// obtem a abreviacao do mes
$time = mktime(0, 0, 0, $data_explode[1]);

// nome abreviado do mes
$nome_mes = strftime("%b", $time);

// numero do dia da data
$numero_dia = $data_explode[0];

// obtendo dados de data 
$mes = $nome_mes; // mes
$dia = $data_explode[0]; // dia
$ano = $data_explode[2]; // ano

// data completa
$dia_semana = date('w', mktime(0,0,0, $data_explode[1], $data_explode[0], $data_explode[2]));

// data completa
$data_completa = $semana_idioma[$dia_semana]." {$dia} $idioma[303] ".$mes_extenso_idioma[$mes]." $idioma[303] {$ano}";

// retorno
return $data_completa;

};

?>