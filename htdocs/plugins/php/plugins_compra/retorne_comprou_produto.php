<?php

// retorna se comprou um produto
function retorne_comprou_produto($id){

// tabela
$tabela = TABELA_VENDAS;

// id de usuario logado
$idusuario = retorne_idusuario_logado();

// query
$query = "select *from $tabela where idamigo='$idusuario' and idproduto='$id';";

// retorno
if(retorne_numero_linhas_query($query) == 1){

// comprou produto
return true;

}else{

// nao comprou produto
return false;
	
};

};

?>