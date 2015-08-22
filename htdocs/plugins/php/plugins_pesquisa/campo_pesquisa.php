<?php

// campo de pesquisa
function campo_pesquisa(){

// globals
global $idioma;
global $requeste;

// url de formulario
$url_formulario = PAGINA_INICIAL;

// termo de pesquisa
$termo_pesquisa = retorna_termo_pesquisa();

// campo categorias
$campo_categorias = gerador_select_option(retorne_array_categorias(), null, $requeste[3], null, null);

// codigo html
$codigo_html = "
<div class='classe_campo_pesquisa'>
<form action='$url_formulario' method='get'>

<div>
<input type='text' name='$requeste[1]' placeholder='$idioma[46]' value='$termo_pesquisa'>
</div>

<div>
<input type='submit' value='$idioma[44]' class='botao_padrao'>
<input type='reset' value='$idioma[45]' class='botao_cadastro'>
$campo_categorias
</div>

</form>
</div>
";

// retorno
return $codigo_html;

};

?>