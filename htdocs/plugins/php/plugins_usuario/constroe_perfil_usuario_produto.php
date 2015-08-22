<?php

// constroe perfil usuario produto
function constroe_perfil_usuario_produto($idusuario){

// globals
global $pagina_href;
global $idioma;
global $requeste;

// dados de perfil de usuario
$dados = dados_perfil_usuario($idusuario);

// separa dados
$nome = $dados['nome'];

// imagem do perfil
$imagem_perfil = constroe_imagem_perfil($idusuario, false);

// url de perfil de usuario
$url_perfil_usuario = $pagina_href[8].$idusuario."&$requeste[0]=".$idioma[19];

// url de perfil
$url_perfil_usuario_visualizar = $pagina_href[8].$idusuario."&$requeste[0]=".$idioma[63];

// campo seguir
$campo_seguir = campo_seguir_usuario($idusuario);

// codigo html
$codigo_html = "
<div class='classe_div_perfil_usuario_produto'>
<div>

$imagem_perfil

</div>

<a href='$url_perfil_usuario' title='$nome'>
<span>$nome</span>
</a>

<a href='$url_perfil_usuario_visualizar' title='$idioma[64]'>
<span>
$idioma[64]
</span>
</a>

</div>

$campo_seguir

";

// retorno
return $codigo_html;

};

?>