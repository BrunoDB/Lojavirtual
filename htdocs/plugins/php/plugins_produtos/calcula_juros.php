<?php

// calcula os juros
function calcula_juros($preco, $parcelas, $juros){

// calculo
@$juros_calculado = ($preco * $juros) / 100;
@$preco_mes = ($preco + $juros_calculado) / $parcelas;

// arredonda
$preco_mes = round($preco_mes, 2);

// retorno
return $preco_mes;

};

?>