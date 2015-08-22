
// seguir usuario
function seguir_usuario(idusuario){

// monta requisicao
$.post(v_pagina_acoes, {uid: idusuario, tipo_pagina_acao: 7}, function(retorno){

location.reload();

});

};
