<?php

// app calculadora
function app_calculadora(){

// contador
$contador = 0;

// botoes da calculadora
for($contador == $contador; $contador <= 9; $contador++){

$botoes_calculadora .= "<input type='button' class='botao_padrao' value='$contador' onclick='adiciona_numero_calculadora($contador);'>";

};

// botoes de aritimetica da calculadora
$botoes_aritimetica_calculadora = "

<input type='button' class='botao_padrao' value='+' onclick='adiciona_sinal_calculadora(1);'>
<input type='button' class='botao_padrao' value='-' onclick='adiciona_sinal_calculadora(2);'>
<input type='button' class='botao_padrao' value='/' onclick='adiciona_sinal_calculadora(3);'>
<input type='button' class='botao_padrao' value='*' onclick='adiciona_sinal_calculadora(4);'>
<input type='button' class='botao_padrao' value='.' onclick='adiciona_sinal_calculadora(5);'>

";

// botoes de resultado
$botoes_resultado_calculadora = "

<input type='button' class='botao_padrao' value='=' onclick='calcula_resultado_calculadora(1);'>
<input type='button' class='botao_padrao' value='C' onclick='calcula_resultado_calculadora(2);'>

";

// codigo html
$codigo_html = "

<div class='classe_div_calculadora'>

<div class='classe_div_visor_calculadora' id='id_div_visor_calculadora'>0</div>

<div class='classe_div_botoes_calculadora'>
$botoes_calculadora
</div>

<div class='classe_div_botoes_calculadora'>
$botoes_aritimetica_calculadora
</div>

<div class='classe_div_botoes_calculadora'>
$botoes_resultado_calculadora
</div>

</div>

";

// retorno
return $codigo_html;

};

?>