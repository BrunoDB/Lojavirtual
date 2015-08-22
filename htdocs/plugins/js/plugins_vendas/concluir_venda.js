
// concluir venda
function concluir_venda(id, idamigo, modo, quantidade){

// monta requisicao
$.post(v_pagina_acoes, {idproduto: id, modo: modo, idamigo: idamigo, quantidade: quantidade, tipo_pagina_acao: 23}, function(retorno){

location.reload();

});

};

