<?php

// valida valor
function valida_valor($valor, $aceita_float){

// valida valor
if($valor == null){

// informa que nao e um valor
return false;
	
};

// remove a virgula se houver
$valor = str_replace(",", ".", $valor);

// remove espaco vazio no meio se houver
$valor = str_replace(" ", null, $valor);

// remove o espaco em branco
$valor = trim($valor);

// valida se e numero, e se e numero positivo
if(is_numeric($valor) == false or $valor < 0){

// informa que nao e um numero
return false;
	
};

// arredonda valor se nao aceitar float
if($aceita_float == false){

// arredonda
$valor = round($valor, 0);	
	
};

// se aceitar float, e for float entao arredonda
if($aceita_float == true){

// arredonda
$valor = round($valor, 2);	

};

// retorno
return $valor;

};

?>