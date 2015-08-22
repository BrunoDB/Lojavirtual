<?php

// retorna o id de usuario visualizando perfil
function retorne_idusuario_visualizando(){

// globals
global $requeste;

// id de usuario modo request
$idusuario = remove_html($_REQUEST[$requeste[2]]);

// retorno
return $idusuario;

};

?>