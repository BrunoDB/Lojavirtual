<?php

// confirma o pagamento de produto
function confirmar_pagamento(){

// id de produto
$idproduto = retorne_idproduto_get();

// id de amigo
$idamigo = remove_html($_REQUEST['idamigo']);

// id de usuario logado
$idusuario = retorne_idusuario_logado();

// tabela
$tabela = TABELA_VENDAS;

// query
$query = "update $tabela set pago='1' where idusuario='$idusuario' and idamigo='$idamigo' and idproduto='$idproduto';";

// executa query
comando_executa($query);

};

?>