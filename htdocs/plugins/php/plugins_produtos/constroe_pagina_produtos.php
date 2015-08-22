<?php

// constroe a pagina de produtos
function constroe_pagina_produtos(){

// globals
global $idioma;

// codigo html
$codigo_html = "
<div class='classe_div_produtos_usuario' id='id_div_produtos_usuario'></div>
<div class='classe_div_carregar_mais_produtos' onclick='carrega_produtos();'>$idioma[43]</div>
";

// retorno
return $codigo_html;

};

?>