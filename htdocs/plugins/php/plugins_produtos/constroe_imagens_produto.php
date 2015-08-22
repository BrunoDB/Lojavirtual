<?php

// constroe imagens de produtos
function constroe_imagens_produto($idalbum){

// tabela
$tabela = TABELA_IMAGENS_ALBUM;

// limit
$limit = CONFIG_NUM_IMAGENS_PRODUTO_BASICO;

// id de produto via get
$idproduto = retorne_idproduto_get();

// query
if($idproduto != -1){
	
$query = "select *from $tabela where idalbum='$idalbum';";

}else{
	
$query = "select *from $tabela where idalbum='$idalbum' limit $limit;";
	
};

// comando
$comando = comando_executa($query);

// contador
$contador = 0;

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// constroe imagens
for($contador == $contador; $contador <= $numero_linhas; $contador++){

// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// separa dados
$id = $dados['id'];
$url_imagem = $dados['url_imagem'];
$url_imagem_miniatura = $dados['url_imagem_miniatura'];

// valida id
if($id != null){

// codigo html
$codigo_html .= "
<a class='fancybox' rel='group' href='$url_imagem'>
<img src='$url_imagem_miniatura'>
</a>
";

};

};

// retorno
return $codigo_html;

};

?>