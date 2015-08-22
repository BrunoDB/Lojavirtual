<?php

// seguir usuario
function seguir_usuario(){

// globals
global $requeste;

// valida usuario logado
if(retorne_usuario_logado() == false){

// retorno falso
return false;
	
};

// tabela
$tabela[0] = TABELA_SEGUIDORES;
$tabela[1] = TABELA_AMIZADE;

// dados de formulario
$idamigo = remove_html($_REQUEST[$requeste[2]]);

// idusuario logado
$idusuario = retorne_idusuario_logado();

// usuario seguindo
$usuario_seguindo = retorne_usuario_seguindo($idusuario, $idamigo);

// verifica se nao e o proprio usuario
if($usuario_seguindo == null or $idamigo == null or $idusuario == null){

// retorno nulo
return null;

};

// data
$data = data_atual();

// adiciona ou remove
switch($usuario_seguindo){

case 1: // remove
// tabela seguidores
$query[] = "delete from $tabela[0] where idusuario='$idamigo' and idamigo='$idusuario';";

// tabela amizade
$query[] = "delete from $tabela[1] where idusuario='$idamigo' and idamigo='$idusuario';";
$query[] = "delete from $tabela[1] where idusuario='$idusuario' and idamigo='$idamigo';";
break;

case 2: // adiciona
// tabela seguidores
$query[] = "delete from $tabela[0] where idusuario='$idamigo' and idamigo='$idusuario';";
$query[] = "insert into $tabela[0] values(null, '$idamigo', '$idusuario', '$data');";

// tabela amizade
$query[] = "delete from $tabela[1] where idusuario='$idamigo' and idamigo='$idusuario';";
$query[] = "delete from $tabela[1] where idusuario='$idusuario' and idamigo='$idamigo';";
$query[] = "insert into $tabela[1] values(null, '$idamigo', '$idusuario', '$data');";
$query[] = "insert into $tabela[1] values(null, '$idusuario', '$idamigo', '$data');";
break;	
	
};

// comando executa
executador_querys($query);

};

?>