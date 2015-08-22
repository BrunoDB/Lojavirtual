<?php

// constroe o seguidor do usuario
function constroe_seguidor_usuario($dados, $modo){

// separa dados
$idusuario = $dados['idusuario'];
$idamigo = $dados['idamigo'];
$data = $dados['data'];

// valida idamigo
if($idusuario == null or $idamigo == null){

// retorno nulo
return null;

};

// valida modo
if($modo == 2){

$idamigo = $idusuario;

};

// url de perfil de usuario
$url_perfil_usuario = retorne_url_perfil_usuario($idamigo);

// imagem de usuario
$imagem_usuario = constroe_imagem_perfil($idamigo, false);

// nome do usuario
$nome_usuario = retorne_nome_usuario($idamigo);
$nome_usuario = "<a href='$url_perfil_usuario' title='$nome_usuario'>$nome_usuario</a>";

// campo seguir
$campo_seguir = campo_seguir_usuario($idamigo);

// codigo html
$codigo_html = "
<div class='classe_div_seguidor_usuario'>

<div class='classe_div_seguidor_usuario_imagem'>
$imagem_usuario
</div>

<div class='classe_div_seguidor_usuario_nome'>
$nome_usuario
</div>

<div class='classe_div_seguidor_usuario_botao'>
$campo_seguir
</div>

</div>
";

// retorno
return $codigo_html;

};

?>