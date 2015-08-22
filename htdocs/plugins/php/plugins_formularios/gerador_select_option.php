<?php

// gerador de select option
function gerador_select_option($array_options, $valor_atual, $nome, $idcampo, $evento_campo){

// codigo html
foreach($array_options as $valor){

// monta option
if($valor == $valor_atual){

$codigo_html .= "<option value='$valor' selected>$valor</option>";

}else{

$codigo_html .= "<option value='$valor'>$valor</option>";

};

};

// monta select
$codigo_html = "<select name='$nome' id='$idcampo' $evento_campo>$codigo_html</select>";

// retorno
return $codigo_html; // retorno

};

?>