<?php

// retorna o array de categorias
function retorne_array_categorias(){

// tabela
$tabela = TABELA_CATEGORIAS;

// idioma atual
$idioma_atual = retorne_idioma_sessao_usuario();

// query
$query = "select *from $tabela where idioma='$idioma_atual' order by categoria asc;";

// comando
$comando = comando_executa($query);

// contador
$contador = 0;

// array de categorias
$array_categorias = array();

// primeiro indice de categorias
$array_categorias[] = null;

// constroe produtos
for($contador == $contador; $contador <= retorne_numero_linhas_comando($comando); $contador++){

// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// separa dados
$categoria = $dados['categoria'];

// valida categoria
if($categoria != null){
	
// atualiza array de categorias
$array_categorias[] = $categoria;
	
};

};

// retorno
return $array_categorias;

};

?>