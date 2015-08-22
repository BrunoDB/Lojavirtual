
// confirma o pagamento
function confirmar_pagamento(idproduto, idamigo){

// monta requisicao
$.post(v_pagina_acoes, {idproduto: idproduto, idamigo: idamigo, tipo_pagina_acao: 25}, function(retorno){

location.reload();

});

};

