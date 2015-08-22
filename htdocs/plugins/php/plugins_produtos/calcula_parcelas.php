<?php

// calcula parcelas
function calcula_parcelas($preco, $parcelamento){

// retorno
return @$juros_mensal = round($preco / $parcelamento, 2);

};

?>