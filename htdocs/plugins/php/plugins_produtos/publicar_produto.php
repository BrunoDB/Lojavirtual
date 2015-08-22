<?php

// publica um novo produto
function publicar_produto(){

// campos texto de formulario
$titulo = remove_html($_REQUEST['titulo']);
$descricao = remove_html($_REQUEST['descricao']);
$categoria = remove_html($_REQUEST['categoria']);

// campos numericos de formulario
$quantidade = remove_html($_REQUEST['quantidade']);
$parcelamento = remove_html($_REQUEST['parcelamento']);
$juros = remove_html($_REQUEST['juros']);
$preco = remove_html($_REQUEST['preco']);

// valor padrao de juros
if($juros == null){

$juros = 0;	
	
};

// valida campos necessarios
$quantidade = valida_valor($quantidade, false);
$parcelamento = valida_valor($parcelamento, false);
$juros = valida_valor($juros, true);
$preco = valida_valor($preco, true);

// valida campos de texto
if($titulo == null or $descricao == null){

// retorno nulo
return null;
	
};

// valida campos numericos
if($quantidade === false or $parcelamento === false or $juros === false or $preco === false){

// retorno nulo
return null;	
	
};

// tabela
$tabela = TABELA_PRODUTO;

// data
$data = data_atual();

// id de usuario
$idusuario = retorne_idusuario_logado();

// faz upload e pega o id de album
$idalbum = upload_imagens_album();

// query
$query = "insert into $tabela values(null, '$idusuario', '$idalbum', '$titulo', '$descricao', '$quantidade', '$parcelamento', '$juros', '$preco', '$categoria', '$data');";

// cadastra dados
if(retorne_usuario_logado() == true){
	
// executa comando
comando_executa($query);

// adiciona novo feed em seguidores
atualiza_numero_feeds(true);

};

};

?>