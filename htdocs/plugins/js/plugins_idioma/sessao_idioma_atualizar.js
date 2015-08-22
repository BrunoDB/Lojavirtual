
// salva a sessao de idioma
function sessao_idioma_atualizar(modo){

// monta requisicao
$.post(v_pagina_acoes, {modo: modo, tipo_pagina_acao: 6}, function(retorno){

// abre a pagina inicial
window.open(v_pagina_inicial, "_self");

});

};

