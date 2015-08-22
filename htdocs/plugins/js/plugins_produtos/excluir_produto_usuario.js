
// excluir produto
function excluir_produto_usuario(id){

// monta requisicao
$.post(v_pagina_acoes, {idproduto: id, tipo_pagina_acao: 27}, function(retorno){

// recarrega a pagina
location.reload();

});

};

