<?php

// remove codificação html
function remove_html($codigo_html){

// remove codificação html
$codigo_html = addslashes($codigo_html);
$codigo_html = strip_tags($codigo_html);

// se for e-mail converte para minusculo
if(verifica_se_email_valido($codigo_html) == true){

$codigo_html = strtolower($codigo_html);

};

// retorna
return $codigo_html;

};


?>
