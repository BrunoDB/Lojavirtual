<?php

// retorna a imagem do servidor
function retorne_imagem_servidor($numero){

// globals
global $idioma;
global $pagina_href;
global $requeste;

// nome sistema
$nome_sistema = NOME_SISTEMA;

// numero da imagem
switch($numero){

case 0:
$url_link = PAGINA_INICIAL;
$titulo = NOME_SISTEMA;
break;

case 1:
$url_link = $pagina_href[3];
$titulo = $idioma[16];
break;

case 2:
$url_link = $pagina_href[4]."&".$requeste[2]."=".retorne_idusuario_visualizando();
$titulo = $idioma[18];
break;

case 3:
$url_link = $pagina_href[5];
$titulo = $idioma[20];
break;

case 4:
$titulo = $idioma[22];
$url_link = $pagina_href[14];
break;

case 5:
$url_link = $pagina_href[7];
$titulo = $idioma[47];
break;

case 6:
return PASTA_IMAGENS_SISTEMA."$numero.png";
break;

case 7:
return PASTA_IMAGENS_SISTEMA."$numero.png";
break;

case 8:
$titulo = $idioma[66];
break;

case 9:
$titulo = $idioma[67];
break;

case 10:
$url_link = $pagina_href[11];
$titulo = $idioma[72];
break;

case 11:
$url_link = $pagina_href[10];
$titulo = $idioma[73];
break;

case 12:
$url_link = $pagina_href[12];
$titulo = $idioma[74];
break;

case 13:
$url_link = $pagina_href[13];
$titulo = $idioma[75];
break;

case 14:
$titulo = $idioma[86];
break;

case 15:
$titulo = $idioma[85];
break;

case 16:
$titulo = $idioma[87];
break;

case 17:
$titulo = $idioma[92];
break;

case 19:
$titulo = $idioma[123];
break;

};

// imagem
if($url_link == null){

// imagem
$imagem = "<img src='".PASTA_IMAGENS_SISTEMA."$numero.png"."' title='$titulo' $evento>";

}else{

// imagem
$imagem = "<img src='".PASTA_IMAGENS_SISTEMA."$numero.png"."' title='$titulo' $evento>";

// verifica se ha um evento, se houver nao transforma em link
if($evento == null){
	
$imagem = "<a href='$url_link' title='$titulo'>$imagem</a>";

};

};

// retorno
return $imagem;

};

?>