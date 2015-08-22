
// calcula novo preco de compra
function calcula_preco_compra(id, preco, juros){

// quantidade
var v_quantidade = document.getElementById("id_select_numero_produtos_" + id).value;

// total a pagar
var v_total_pagar_juros = (v_quantidade * preco);
var v_total_pagar = (v_quantidade * preco);

// calcula juros
v_total_pagar_juros += (v_total_pagar_juros * juros) / 100;

// arredonda
v_total_pagar_juros = v_total_pagar_juros.toFixed(2);
v_total_pagar = v_total_pagar.toFixed(2);

// total a ser pago com juros
if($("#id_div_preco_finaliza_compra_juros_" + id).length > 0){

document.getElementById("id_div_preco_finaliza_compra_juros_" + id).innerHTML = "R$ " + v_total_pagar_juros;

};

// preco sem juros
document.getElementById("id_div_preco_finaliza_compra_" + id).innerHTML = "R$ " + v_total_pagar;

};
