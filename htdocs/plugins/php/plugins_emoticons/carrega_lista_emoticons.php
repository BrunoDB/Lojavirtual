<?php

// carrega a lista de emoticons
function carrega_lista_emoticons(){

// contadores
$contador = 1;

// prefixo do emoticon
$prefixo_emoticon = PREFIXO_EMOTICON;

// constroe emoticons
for($contador == $contador; $contador <= NUMERO_EMOTICONS_ATUAL; $contador++){
	
$conteudo_emoticons .= "<img src='".PASTA_IMAGENS_SISTEMA."$prefixo_emoticon ($contador)".".png' onclick='adiciona_emoticon($contador);' title='$prefixo_emoticon ($contador)'>";

};

// adiciona div
$codigo_html .= "<div class='classe_div_emoticons'>";
$codigo_html .= $conteudo_emoticons;
$codigo_html .= "</div>";

// retorno
return $codigo_html;

};

?>