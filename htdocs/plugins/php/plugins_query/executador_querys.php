<?php

// executador de querys
function executador_querys($querys_array){

// executando query
foreach($querys_array as $query_executar){

// comando executa
comando_executa($query_executar);

};

};

?>