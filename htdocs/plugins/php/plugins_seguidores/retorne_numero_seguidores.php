<?php

// retorna no numero de seguidores
function retorne_numero_seguidores($idusuario){

// tabela
$tabela = TABELA_SEGUIDORES;

// query
$query = "select *from $tabela where idusuario='$idusuario';";

// retorno
return retorne_tamanho_resultado(retorne_numero_linhas_query($query));

};

?>