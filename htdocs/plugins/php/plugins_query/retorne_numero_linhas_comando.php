<?php


// retorna numero de linhas de comando
function retorne_numero_linhas_comando($comando){

// valida comando
if($comando == null){

return 0;

};

// retorna numero de linhas
return mysql_num_rows($comando);

};


?>