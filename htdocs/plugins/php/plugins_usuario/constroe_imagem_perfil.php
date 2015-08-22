<?php

// constroe a imagem de perfil
function constroe_imagem_perfil($idusuario, $modo){

// globals
global $pagina_href;
global $requeste;

// dados do usuario
$dados = dados_perfil_usuario($idusuario);

// separa dados do perfil
$imagem_perfil = $dados['imagem_perfil'];
$imagem_perfil_miniatura = $dados['imagem_perfil_miniatura'];
$nome = $dados['nome'];

// tipo de imagem
if($modo == true){

// codigo html
$codigo_html = "
<img src='$imagem_perfil' title='$nome'>
";
	
}else{

// codigo html
$codigo_html = "
<img src='$imagem_perfil_miniatura' title='$nome' class='classe_imagem_miniatura_perfil'>
";	
	
};

// id de usuario
$idusuario = $dados['idusuario'];

// url da loja do usuario
$url_loja_usuario = $pagina_href[4]."&".$requeste[2]."=".$idusuario;

// adiciona link
$codigo_html = "<a href='$url_loja_usuario'>$codigo_html</a>";

// retorno
return $codigo_html;

};

?>