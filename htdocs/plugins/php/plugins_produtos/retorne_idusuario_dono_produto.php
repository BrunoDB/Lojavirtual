<?php

// retorna o id de usuario dono do produto
function retorne_idusuario_dono_produto($id){

// tabela
$tabela = TABELA_PRODUTO;

// query
$query = "select *from $tabela where id='$id';";

// dados
$dados = retorne_dados_query($query);

// retorno
return $dados['idusuario'];

};

?>