<?php

// formulario de login
function formulario_login(){

// global
global $idioma;

// redireciona para o perfil
if(retorne_usuario_logado() == true){

// perfil do usuario
chama_perfil_usuario();

// retorno nulo
return null;
	
};

// codigo html
$codigo_html = "
<div class='classe_mensagem_login_cadastro' id='id_mensagem_login_cadastro'></div>
<span>$idioma[7]</span>
<input type='text' id='id_email_login' placeholder='$idioma[5]' onkeydown='if(event.keyCode == 13){cadastro_usuario();}'>
<input type='password' id='id_senha_login' placeholder='$idioma[6]' onkeydown='if(event.keyCode == 13){cadastro_usuario();}'>
<div>
<input type='button' value='$idioma[4]' class='botao_padrao' onclick='logar_usuario();'>
$idioma[8]
<input type='button' value='$idioma[9]' class='botao_cadastro' onclick='cadastro_usuario();'>
</div>
";

// retorno
return constroe_formulario($codigo_html);

};

?>