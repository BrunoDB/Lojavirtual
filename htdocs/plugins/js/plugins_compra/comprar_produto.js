
// compra produto
function comprar_produto(idproduto){


// quantidade de itens
var quantidade = document.getElementById("id_select_numero_produtos_" + idproduto).value;


// monta requisicao
$.post(v_pagina_acoes, {idproduto: idproduto, quantidade: quantidade, tipo_pagina_acao: 21}, function(retorno){

// abre a pagina do produto
window.open(v_pagina_inicial + "?idproduto=" + idproduto, "_self");


});

};

