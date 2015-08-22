<?php

// retorna um array com todos os arquivos
function retorne_lista_todos_arquivos($endereco_pasta, $extensao, $auto_include){

// extensao exemplo: .php
// auto include adiciona o script php ao script atual, e retorna lista de arquivos.


// pasta de arquivos, e lista de arquivos
$pasta_diretorio = new RecursiveDirectoryIterator($endereco_pasta);
$lista_arquivos = new RecursiveIteratorIterator($pasta_diretorio);


// array com lista de arquivos
$arquivos_encontrados = array();


// listando arquivos
foreach ($lista_arquivos as $informacao_arquivo) {


// extensao de arquivo
$extensao_arquivo = ".".pathinfo($informacao_arquivo, PATHINFO_EXTENSION);


// atualiza lista de retorno
if($extensao == $extensao_arquivo or $extensao == null){


// endereco do arquivo
$endereco_arquivo = $informacao_arquivo->getPathname();


// atualiza array de retorno
$arquivos_encontrados[] = $endereco_arquivo;


// auto-include
if($auto_include == true){

include_once($endereco_arquivo);

};


};


};


// retorno
return $arquivos_encontrados;


};


?>