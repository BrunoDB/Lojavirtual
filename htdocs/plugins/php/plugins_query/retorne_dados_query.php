<?php

// retorne dados de query
function retorne_dados_query($query){

// comando
$comando = comando_executa($query);

// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// retorno
return $dados;

};

?>