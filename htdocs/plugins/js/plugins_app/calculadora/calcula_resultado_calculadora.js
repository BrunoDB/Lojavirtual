
// calcula o resultado
function calcula_resultado_calculadora(tipo){
	
// tipo de resultado
switch(tipo){

case 1:
// valor atual
var v_valor = document.getElementById("id_div_visor_calculadora").innerHTML;
// calcula valor
v_valor = eval(v_valor);
// exibe novo valor
document.getElementById("id_div_visor_calculadora").innerHTML = v_valor;
break;

case 2:
document.getElementById("id_div_visor_calculadora").innerHTML = 0;
break;
	
};
	
};
