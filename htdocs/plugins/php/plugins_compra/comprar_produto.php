<?php

// compra produto
function comprar_produto(){

// tabela
$tabela = TABELA_VENDAS;

// id de produto
$idproduto = retorne_idproduto_get();

// id de usuario logado
$idamigo = retorne_idusuario_logado();

// id de usuario dono do produto
$idusuario = retorne_idusuario_dono_produto($idproduto);

// dados de preco, juros etc
$quantidade = remove_html($_REQUEST['quantidade']);

// dados do produto
$dados_produto = retorne_dados_produto($idproduto);

// separa dados
$preco = $dados_produto['preco'];

// preco com juros
$preco_juros = calcula_juros($dados_produto['preco'], 1, $dados_produto['juros']);

// calcula valor total a ser pago
$preco_juros *= $quantidade;

// valor de juros
$juros = $dados_produto['juros'];

// numero de parcelamentos
$parcelamento = $dados_produto['parcelamento'];

// calcula o valor mensal
$valor_mensal = round(($preco_juros / $parcelamento), 2);

// valida campos necessarios
if($idproduto == null or $idusuario == null or $idamigo == null or retorne_usuario_logado() == false){

// retorno nulo
return null;

};

// data
$data = data_atual();

// query
$query[] = "delete from $tabela where idusuario='$idusuario' and idamigo='$idamigo' and idproduto='$idproduto';";
$query[] = "insert into $tabela values(null, '$idusuario', '$idamigo', '$idproduto', '$quantidade', '$preco', '$preco_juros', '$juros', '$parcelamento', '$valor_mensal', '0', '0', '$data');";

// executa querys
executador_querys($query);

};

?>