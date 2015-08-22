<?php

// limit de query
function limit_query(){

// valor de contador
$contador = remove_html($_REQUEST['contador']);

// valida contador
if($contador == null){

// valor padrao de contador
$contador -= CONFIG_LIMIT_PESQUISA;
	
};

// contador de avanco
$contador_inicial = $contador + CONFIG_LIMIT_PESQUISA;
$contador_final = $contador_inicial + CONFIG_LIMIT_PESQUISA;

// limit
$limit_query = "limit $contador_inicial, $contador_final";

// retorno
return $limit_query;

};

?>