<?php

// mensagem de sistema sucesso
function mensagem_sistema_sucesso($mensagem){

// codigo html
$codigo_html .= "<div class='classe_div_mensagem_sistema_sucesso'>";
$codigo_html .= $mensagem;
$codigo_html .= "</div>";

// retorno
return $codigo_html;

};

?>