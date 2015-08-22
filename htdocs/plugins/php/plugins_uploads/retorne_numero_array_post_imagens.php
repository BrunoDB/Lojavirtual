<?php

// retorna o numero de imagens no array de post de imagens
function retorne_numero_array_post_imagens(){

// contador
$contador = 0;

// contando numero de imagens validas
foreach($_FILES['fotos']['tmp_name'] as $nome){

// valida nome de imagem temporaria
if($nome != null){

// atualiza contador
$contador++;

};

};

// retorno
return $contador;

};

?>