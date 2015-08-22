<?php

// constroe a imagem de perfil de chat
function imagem_perfil_chat($idusuario){

// dados do usuario
$dados = dados_perfil_usuario($idusuario);

// separa dados do perfil
$imagem_perfil_miniatura = $dados['imagem_perfil_miniatura'];
$nome = $dados['nome'];

// codigo html
$codigo_html = "<img src='$imagem_perfil_miniatura' alt='$nome' title='$nome' class='classe_imagem_miniatura_perfil'>";

// retorno
return $codigo_html;

};

?>