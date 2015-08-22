<?php

// campo avaliar perfil de usuario
function campo_avaliar_perfil_usuario(){

// globals
global $idioma;

// valida usuario logado
if(retorne_usuario_logado() == false){

// retorno nulo
return null;

};

// id de usuario
$idusuario = retorne_idusuario_request();

// usuario dono do perfil
$usuario_dono = retorne_usuario_dono_perfil();

// dados de avaliacao
$dados_avaliacao = retorne_dados_avaliacao_perfil_usuario($idusuario);

// separa dados de avalicacao
$agilidade = $dados_avaliacao['agilidade'];
$atendimento = $dados_avaliacao['atendimento'];
$honestidade = $dados_avaliacao['honestidade'];

// tipos de classes
$tipo_classe[1] = retorna_tipo_classe_avaliacao($agilidade);
$tipo_classe[2] = retorna_tipo_classe_avaliacao($atendimento);
$tipo_classe[3] = retorna_tipo_classe_avaliacao($honestidade);

// codigo html
$codigo_html = "
<div class='classe_div_avaliar_perfil'>
<div class='classe_div_avaliar_perfil_titulo'>$idioma[118]</div>

<div class='classe_div_avaliar_perfil_apresenta_repucacao'>
<div class='$tipo_classe[1]' onclick='avaliar_perfil_usuario(1);'>$agilidade$idioma[122]</div>
<div class='$tipo_classe[2]' onclick='avaliar_perfil_usuario(2);'>$atendimento$idioma[122]</div>
<div class='$tipo_classe[3]' onclick='avaliar_perfil_usuario(3);'>$honestidade$idioma[122]</div>
</div>

<div class='classe_div_avaliar_perfil_apresenta_repucacao'>
<div>$idioma[119]</div>
<div>$idioma[120]</div>
<div>$idioma[121]</div>
</div>

</div>
";

// retorno
return $codigo_html;

};

?>