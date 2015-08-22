<?php

// cancela a compra
function cancelar_compra(){

// id de produto
$idproduto = retorne_idproduto_get();

// tabela
$tabela = TABELA_VENDAS;

// id de usuario
$idusuario = retorne_idusuario_logado();

// query
$query = "delete from $tabela where idamigo='$idusuario' and idproduto='$idproduto';";

// comando executa
comando_executa($query);

};

?>