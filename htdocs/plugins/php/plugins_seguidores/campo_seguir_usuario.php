<?php

// campo seguir usuario
function campo_seguir_usuario($idamigo){

// globals
global $idioma;

// valida usuario logado
if(retorne_usuario_logado() == false){

// retorno nulo
return null;
	
};

// idusuario logado
$idusuario = retorne_idusuario_logado();

// usuario seguindo
$usuario_seguindo = retorne_usuario_seguindo($idusuario, $idamigo);

// verifica se nao e o proprio usuario
if($usuario_seguindo == null){

// retorno nulo
return null;
	
};

// numero seguidores
$numero_seguidores = retorne_numero_seguidores($idamigo);

// constroe botao seguir
switch($usuario_seguindo){
	
case 1:
$botao_seguir = "<input type='button' value='$idioma[71] $numero_seguidores' class='botao_padrao' onclick='seguir_usuario($idamigo);'>";
break;

case 2:
$botao_seguir = "<input type='button' value='$idioma[70] $numero_seguidores' class='botao_cadastro' onclick='seguir_usuario($idamigo);'>";
break;
	
};

// codigo html
$codigo_html = "
<div class='classe_div_campo_seguir'>

<div>
$botao_seguir
</div>

</div>
";

// retorno
return $codigo_html;

};

?>