<?php

// executador de comando
function comando_executa($query){

// comando
if($query != null){

// executa comando
$comando = mysql_query($query);

}else{

// retorno nulo
return null;

};

// retorna comando
return $comando;

};

?>