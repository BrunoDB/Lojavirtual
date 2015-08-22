
// estado da lixeira
function estado_lixeira(){


// monta requisicao
$.post(v_pagina_acoes, {tipo_pagina_acao: 17}, function(retorno){


// valida backup com retorno
if(v_estado_lixeira_bkp != retorno){

// iguala variaveis
v_estado_lixeira_bkp = retorno;

// exibe novo valor
document.getElementById("classe_div_campo_opcoes_chat_lixeira").innerHTML = retorno;

};


});


};

