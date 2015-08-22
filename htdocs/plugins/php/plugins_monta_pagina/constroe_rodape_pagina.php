<?php

// constroe o rodape da pagina
function constroe_rodape_pagina(){

// globals
global $idioma;

// codigo html
$codigo_html .= "<div class='div_rodape_pagina'>";
$codigo_html .= constroe_conteudo_rodape();
$codigo_html .= "</div>";

// retorno
return $codigo_html;

};

?>