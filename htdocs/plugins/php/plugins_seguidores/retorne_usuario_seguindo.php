<?php

// retorna se o usuario esta seguindo
function retorne_usuario_seguindo($idamigo, $idusuario){

// tabela
$tabela = TABELA_SEGUIDORES;

// verifica se e o proprio usuario
if($idamigo == $idusuario){

// retorno nulo
return null;

};

// query
$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idamigo';";

// retorno
if(retorne_numero_linhas_query($query) == 1){

// seguidor
return 1;

}else{

// nao seguidor
return 2;

};

};

?>