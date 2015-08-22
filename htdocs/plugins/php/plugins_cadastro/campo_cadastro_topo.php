<?php

// campo de cadastro
function campo_cadastro_topo(){

// globals
global $idioma;
global $pagina_href;

// codigo html
$codigo_html[0] = "
<div class='classe_div_campo_cadastro_topo'>
<a href='$pagina_href[2]' title='$idioma[15]' class='botao_padrao'>$idioma[15]</a>
</div>
";

// codigo html
$codigo_html[1] = "
<div class='classe_div_campo_cadastro_topo'>
<a href='$pagina_href[0]' title='$idioma[2]' class='botao_padrao'>$idioma[2]</a>
</div>
";

// valida o usuario logado
if(retorne_usuario_logado() == true){

// campo de login
return $codigo_html[0];
	
}else{

// campo sair
return $codigo_html[1];
	
};

};

?>