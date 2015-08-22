<?php

// atualiza o estoque ao realizar uma venda
function atualiza_estoque_produtos_concluir_venda($modo, $idproduto, $idamigo, $quantidade_compra){

// dados de produto
$dados = retorne_dados_produto($idproduto);

// separa dados de produto
$quantidade = $dados['quantidade'];

// tabela
$tabela = TABELA_PRODUTO;

// tabela de vendas
$tabela_vendas = TABELA_VENDAS;

// remove de estoque
if($modo == 1){

// remove quantidade
$quantidade -= $quantidade_compra;

}else{

// query
$query = "select *from $tabela_vendas where idproduto='$idproduto' and idamigo='$idamigo' and venda_concluida='1';";

// adiciona quantidade
if(retorne_numero_linhas_query($query) > 0){

// atualiza quantidade
$quantidade += $quantidade_compra;

};

};

// query
$query = "update $tabela set quantidade='$quantidade' where id='$idproduto';";

// comando executa
comando_executa($query);

};

?>