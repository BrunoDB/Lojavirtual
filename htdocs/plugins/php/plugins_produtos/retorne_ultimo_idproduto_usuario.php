<?php

// retorna o id de ultimo produto de usuario
function retorne_ultimo_idproduto_usuario(){

// tabela
$tabela = TABELA_PRODUTO;

// id de usuario
$idusuario = retorne_idusuario_logado();

// query
$query = "select *from $tabela where idusuario='$idusuario' order by id desc;";

// dados
$dados = retorne_dados_query($query);

// retorno
return $dados['id'];

};

?>