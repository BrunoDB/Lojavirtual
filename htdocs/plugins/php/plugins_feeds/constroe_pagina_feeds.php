<?php

// constroe a pagina de feeds
function constroe_pagina_feeds(){

// globals
global $idioma;

// zera o numero de feeds
zera_numero_feeds();
	
// codigo html
$codigo_html = "
<div class='classe_div_produtos_usuario' id='id_div_feeds_usuario'></div>
<div class='classe_div_carregar_mais_produtos' onclick='carrega_feeds();'>$idioma[43]</div>
";

// retorno
return $codigo_html;

};

?>