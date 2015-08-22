<?php

// retorna o id de usuario dono do produto
function retorne_dados_produto($id){

// tabela
$tabela = TABELA_PRODUTO;

// query
$query = "select *from $tabela where id='$id';";

// retorno com dados
return retorne_dados_query($query);

};

?>