<?php


// retorna o numero de linhas da query
function retorne_numero_linhas_query($query){

// comando
$comando = comando_executa($query);

// retorno com numero de linhas
return retorne_numero_linhas_comando($comando);

};


?>