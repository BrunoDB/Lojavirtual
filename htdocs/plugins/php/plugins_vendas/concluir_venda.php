<?php

// concluir uma venda
function concluir_venda(){

// id de produto
$idproduto = retorne_idproduto_get();

// tabela
$tabela = TABELA_VENDAS;

// id de usuario
$idusuario = retorne_idusuario_logado();

// id de amigo
$idamigo = remove_html($_REQUEST['idamigo']);

// quantidade a ser comprada
$quantidade = remove_html($_REQUEST['quantidade']);

// modo
$modo = remove_html($_REQUEST['modo']);

// query
if($modo == 1){

// query
$query = "update $tabela set venda_concluida='1' where idusuario='$idusuario' and idamigo='$idamigo' and idproduto='$idproduto';";

}else{

// query
$query = "delete from $tabela where idusuario='$idusuario' and idamigo='$idamigo' and idproduto='$idproduto';";

};

// valida usuario logado
if(retorne_usuario_logado() == true){

// atualiza o estoque de produtos
// nao descer esta linha
atualiza_estoque_produtos_concluir_venda($modo, $idproduto, $idamigo, $quantidade);

// comando executa
comando_executa($query);

};

};

?>