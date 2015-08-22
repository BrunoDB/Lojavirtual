<?php

// retorna uma lista com todas as pastas
function retorne_lista_todas_pastas($endereco_pasta){

// pastas
$pasta_diretorio = new RecursiveDirectoryIterator($endereco_pasta);

// array com retorno
$array_retorno = array();

// procurando pastas
foreach($pasta_diretorio as $endereco){

// valida o endereco da pasta
if($endereco != null){
	
$array_retorno[] = $endereco;
	
};
	
};

// retorno
return $array_retorno;

};

?>