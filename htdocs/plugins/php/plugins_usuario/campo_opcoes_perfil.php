<?php

// campo de opcoes de perfil
function campo_opcoes_perfil(){

// valida usuario logado
if(retorne_usuario_logado() == false){

return null;

};

// opcoes de perfil
$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(1);
$opcoes .= "</div>";

$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(10);
$opcoes .= "</div>";

$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(11);
$opcoes .= "</div>";

$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(12);
$opcoes .= "<div class='classe_notificacoes_usuario' id='id_notifica_feeds'></div>";
$opcoes .= "</div>";

$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(13);
$opcoes .= "</div>";

$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(2);
$opcoes .= "</div>";

$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(3);
$opcoes .= "<div class='classe_notificacoes_usuario' id='id_notifica_vendas'></div>";
$opcoes .= "</div>";

$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(4);
$opcoes .= "<div class='classe_notificacoes_usuario' id='id_notifica_chat'></div>";
$opcoes .= "</div>";

$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(5);
$opcoes .= "</div>";

// codigo html
$codigo_html = "
<div class='classe_div_campo_opcoes_perfil'>
$opcoes
</div>
";

// retorno
return $codigo_html;

};

?>