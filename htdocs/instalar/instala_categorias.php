<?php

// instala as categorias
foreach(retorne_lista_todas_pastas(PASTA_CATEGORIAS) as $end_pasta_cat){

// valida endereco de pasta
if($end_pasta_cat != null){

// endereco de arquivo
$endereco_arquivo = $end_pasta_cat."\categorias".EXTENSAO_4;

// conteudo de arquivos
$categoria = retorna_conteudo_arquivo($endereco_arquivo);
$idioma = retorna_conteudo_arquivo($end_pasta_cat."\idioma".EXTENSAO_4);

// cadastra em tabela
if($categoria != null and $idioma != null){

// remove as duplicatas se houverem
$categoria = remove_duplicatas_string($categoria, "\n");

// nova lista de categorias
$nova_lista_categorias = $categoria;

// separa as linhas
$categoria = explode("\n", $categoria);

// separa linhas
foreach($categoria as $linha_categoria){

// remove espacos, codigo html etc
if($linha_categoria != null and $idioma != null){

$linha_categoria = remove_html($linha_categoria);
$linha_categoria = trim($linha_categoria);
$linha_categoria = ucfirst($linha_categoria);
$linha_categoria = strtolower($linha_categoria);
$linha_categoria = str_replace("\\", null, $linha_categoria);

// tabela
$tabela = TABELA_CATEGORIAS;

// query
$query = "insert into $tabela values(null, '$linha_categoria', '$idioma');";

// comando executa
comando_executa($query);

};	

};

// salva a nova lista de categorias sem duplicatas
salvar_arquivo($endereco_arquivo, $nova_lista_categorias);

};

};	

};

?>