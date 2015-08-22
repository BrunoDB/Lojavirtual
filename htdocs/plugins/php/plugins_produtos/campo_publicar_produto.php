<?php

// campo publica novo produto
function campo_publicar_produto($dados){

// globals
global $idioma;
global $requeste;

// valor de campo hidden
$valor_campo_hidden = PAGINA_ID3;

// url de formulario
$url_formulario = PAGINA_ACOES;

// campo categorias
$campo_categorias = gerador_select_option(retorne_array_categorias(), null, "categoria", null, null);

// codigo html
$codigo_html = "
<div class='classe_div_publicar_produto'>
<form action='$url_formulario' method='post' enctype='multipart/form-data'>

<input type='hidden' name='$requeste[5]' value='$valor_campo_hidden'>

<div class='classe_div_separa_campos_publica_produto'>
<span>$idioma[24]</span>
<input type='text' required='required' name='titulo' class='classe_campo_titulo_produto_publica'>
</div>

<div class='classe_div_separa_campos_publica_produto'>
<span>$idioma[23]</span>
<textarea cols='10' rows='10' name='descricao' required='required'></textarea>
</div>

<div class='classe_div_separa_campos_publica_produto'>
<span>$idioma[58]</span>
$campo_categorias
</div>

<div class='classe_div_separa_campos_publica_produto'>
<span>$idioma[38]</span>
<input type='number' step='0.1' required='required' name='preco'>
</div>

<div class='classe_div_separa_campos_publica_produto'>
<span>$idioma[25]</span>
<input type='number' required='required' name='quantidade'>
</div>

<div class='classe_div_separa_campos_publica_produto'>
<span>$idioma[26]</span>
<input type='number' required='required' name='parcelamento'>
</div>

<div class='classe_div_separa_campos_publica_produto'>
<span>$idioma[36]</span>
<input type='number' required='required' step='0.1' name='juros' value='0'>
</div>

<div class='classe_div_publicar_produto_imagens'>
<span>$idioma[29]</span>
<input type='file' name='fotos[]' id='elemento_file_campo_publicar' class='campo_file_upload' multiple>
<input type='button' class='botao_cadastro' value='$idioma[27]' onclick='seleciona_imagens_publicacao_usuario();'>
<div class='classe_div_imagens_pre_publicacao' id='div_imagens_pre_publicacao'></div>
</div>

<div class='classe_div_separa_campos_publica_produto'>
<input type='submit' value='$idioma[28]' class='botao_padrao'>
</div>

</form>
</div>
";

// retorno
return $codigo_html;

};

?>