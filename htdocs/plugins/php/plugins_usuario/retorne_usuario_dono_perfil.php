<?php

// retorna se o usuario e o dono do perfil
function retorne_usuario_dono_perfil(){

// valida id de usuario logado, e id de usuario via request
if(retorne_idusuario_logado() == retorne_idusuario_request()){

// sim
return true;

}else{

// nao	
return false;
	
};

};

?>