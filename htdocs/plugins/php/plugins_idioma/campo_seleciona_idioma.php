<?php

// campo seleciona o idioma
function campo_seleciona_idioma(){

// codigo html
$codigo_html .= "<div class='classe_div_campo_seleciona_idioma'>";
$codigo_html .= "<div onclick='sessao_idioma_atualizar(1);'>";
$codigo_html .= retorne_imagem_servidor(8);
$codigo_html .= "</div>";
$codigo_html .= "<div onclick='sessao_idioma_atualizar(2);'>";
$codigo_html .= retorne_imagem_servidor(9);
$codigo_html .= "</div>";
$codigo_html .= "</div>";

// retorno
return $codigo_html;

};

?>