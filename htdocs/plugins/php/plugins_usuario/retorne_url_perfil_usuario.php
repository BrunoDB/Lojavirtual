<?php

// retorna a url de perfil de usuario
function retorne_url_perfil_usuario($idusuario){

// globals
global $pagina_href;
global $requeste;
global $idioma;

// url do perfil
$url_perfil = $pagina_href[8].$idusuario."&".$requeste[0]."=".$idioma[63];

// retorno
return $url_perfil ;

};

?>