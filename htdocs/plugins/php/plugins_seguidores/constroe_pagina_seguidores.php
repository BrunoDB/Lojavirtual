<?php

// constroe a pagina de seguidores
function constroe_pagina_seguidores(){

// globals
global $idioma;

// tabela
$tabela = TABELA_SEGUIDORES;

// id de usuario
$idusuario = retorne_idusuario_request();

// query
if(retorne_href_get() == $idioma[77]){

// query
$query = "select *from $tabela where idusuario='$idusuario';";

// campo seguidores
$campo_seguidores = $idioma[72];

};

// query
if(retorne_href_get() == $idioma[76]){

// query
$query = "select *from $tabela where idamigo='$idusuario';";

// campo seguidores
$campo_seguidores = $idioma[71];

};

// numero de seguidores
$numero_seguidores = retorne_numero_linhas_query($query);
$numero_seguidores = retorne_tamanho_resultado($numero_seguidores);

// codigo html
$codigo_html = "
<div class='classe_div_seguidores_usuario_numero'>
$campo_seguidores
$numero_seguidores
</div>

<div class='classe_div_seguidores_usuario' id='id_div_seguidores_usuario'></div>
<div class='classe_div_carregar_mais_seguidores' onclick='carrega_seguidores();'>$idioma[79]</div>
";

// retorno
return $codigo_html;

};

?>