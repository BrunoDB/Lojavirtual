
// adiciona o sinal
function adiciona_sinal_calculadora(sinal){
	
switch(sinal){
	
case 1:
var v_sinal = "+";
break;

case 2:
var v_sinal = "-";
break;

case 3:
var v_sinal = "/";
break;

case 4:
var v_sinal = "*";
break;

case 5:
var v_sinal = ".";
break;

};

// valor atual
var valor_atual = document.getElementById("id_div_visor_calculadora").innerHTML;

// valor de subvisor
var v_sub_visor = document.getElementById("id_div_visor_calculadora").innerHTML;

// valida sinal ja existe
if(v_sub_visor.indexOf(v_sinal) > -1){

// retorno falso
return false;

};

// atualiza o subvisor
document.getElementById("id_div_visor_calculadora").innerHTML = valor_atual + v_sinal;
	
};
