<?php

// constroe o perfil basico
function constroe_perfil_basico(){

// dados do perfil
$dados = dados_perfil_usuario(retorne_idusuario_request());

// usuario dono do perfil
$usuario_dono_perfil = retorne_usuario_dono_perfil();

// codigo html
$codigo_html = "




";

// retorno
return $codigo_html;

};

?>