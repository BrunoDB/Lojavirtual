<?php

// constroe o conteudo da pagina
function constroe_conteudo_pagina(){

// globals
global $idioma;

// conteudo de pagina
$conteudo_pagina = constroe_conteudo();

// codigo html
$codigo_html .= "<div class='div_conteudo_pagina'>";
$codigo_html .= $conteudo_pagina;
$codigo_html .= "</div>";

// retorno
return $codigo_html;

};

?>