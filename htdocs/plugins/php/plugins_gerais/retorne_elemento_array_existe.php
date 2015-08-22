<?php

// retorna se o elemento do array ja esiste ou nao
function retorne_elemento_array_existe($array_pesquisa, $valor_pesquisa){

// valida tamanho de array
if($array_pesquisa == null){

return false;

};

// varrendo array e comparando valores
foreach($array_pesquisa as $valor_array){

// comparando valor
if($valor_array == $valor_pesquisa){

return true;

};

};

// retorna falso nesse nivel
return false;

};

?>