
// avalia perfil de usuario
function avaliar_perfil_usuario(modo){

// monta requisicao
$.post(v_pagina_acoes, {uid: v_uid, modo: modo, tipo_pagina_acao: 26}, function(retorno){

// atualiza a pagina
location.reload();

});

};

