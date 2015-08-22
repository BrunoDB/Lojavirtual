<?php

// carrega produtos
function carrega_produtos(){

// globals
global $idioma;

// tabela
$tabela = TABELA_PRODUTO;

// limit de query
$limit = "order by id desc ".limit_query();

// termo de pesquisa
$termo_pesquisa = retorna_termo_pesquisa();

// idusuario
$idusuario = retorne_idusuario_request();

// usuario logado
$usuario_logado = retorne_usuario_logado();

// id de produto via get
$idproduto = retorne_idproduto_get();

// categoria de produto
$categoria_produto = retorne_categoria_produto_get();

// produtos de usuario
if(retorne_href_get() == $idioma[19]){

// completa query
$completa = "where idusuario='$idusuario'";

};

// valida termo de pesquisa
if($termo_pesquisa == null){

// query
$query = "select *from $tabela $completa $limit;";
	
}else{

// campo like
$campo_like = "titulo like '% $termo_pesquisa %' or titulo like '$termo_pesquisa %' or titulo like '% $termo_pesquisa' or descricao like '% $termo_pesquisa %' or descricao like '$termo_pesquisa %' or descricao like '% $termo_pesquisa'";

// query
$query = "select *from $tabela where $campo_like $limit;";
	
};

// valida idproduto
if($idproduto != -1){
	
$query = "select *from $tabela where id='$idproduto' $limit;";

};

// pesquisa produto por categoria
if($categoria_produto != null){
	
$query = "select *from $tabela where categoria='$categoria_produto';";
	
};

// comando
$comando = comando_executa($query);

// contador
$contador = 0;

// constroe produtos
for($contador == $contador; $contador <= retorne_numero_linhas_comando($comando); $contador++){

// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// codigo html
$codigo_html .= constroe_produto($dados);
	
};

// separa dados
return $codigo_html;

};

?>