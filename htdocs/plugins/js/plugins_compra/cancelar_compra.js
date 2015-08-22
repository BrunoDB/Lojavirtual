
// calcela a compra
function cancelar_compra(idproduto){

// monta requisicao
$.post(v_pagina_acoes, {idproduto: idproduto, tipo_pagina_acao: 24}, function(retorno){

location.reload();

});

};

