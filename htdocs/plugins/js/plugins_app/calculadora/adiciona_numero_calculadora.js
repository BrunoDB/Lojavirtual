
// adiciona numero no visor da calculadora
function adiciona_numero_calculadora(numero){

// valor atual
valor_atual = document.getElementById("id_div_visor_calculadora").innerHTML;

// valida valor atual e numero
if(valor_atual == "0" && numero == 0){

// retorno nulo
return null;
	
};

// valida valor atual
if(valor_atual == 0){
	
document.getElementById("id_div_visor_calculadora").innerHTML = "";

};

// atualiza visor
document.getElementById("id_div_visor_calculadora").innerHTML += numero;

};
