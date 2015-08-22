<?php

// retorna se o usuario e o dono do produto
function retorne_usuario_dono_produto($id){

// id de usuario dono do produto
$idusuario = retorne_idusuario_dono_produto($id);

// id de usuario logado
$idusuario_logado = retorne_idusuario_logado();

// retorno
if($idusuario == $idusuario_logado){

// dono
return true;

}else{

// nao e dono
return false;

};

};

?>