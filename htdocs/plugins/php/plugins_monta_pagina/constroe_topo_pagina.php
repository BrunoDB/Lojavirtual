<?php

// constroe o topo da pagina
function constroe_topo_pagina(){

// globals
global $idioma;

// imagem de logotipo
$imagem_logotipo = retorne_imagem_servidor(0);

// logotipo de topo
$logotipo_topo .= "<div class='classe_div_logotipo_topo'>";
$logotipo_topo .= $imagem_logotipo;
$logotipo_topo .= "</div>";

// imagem de usuario
if(retorne_usuario_logado() == true){
	
$imagem_usuario .= "<div class='classe_div_imagem_perfil_topo'>";
$imagem_usuario .= constroe_imagem_perfil(retorne_idusuario_logado(), false);
$imagem_usuario .= "</div>";

};

// codigo html
$codigo_html .= "<div class='div_topo_pagina'>";
$codigo_html .= $logotipo_topo;
$codigo_html .= $imagem_usuario;
$codigo_html .= campo_cadastro_topo();
$codigo_html .= campo_opcoes_perfil();
$codigo_html .= "</div>";

// retorno
return $codigo_html;

};

?>