
// seta se o usuario do chat esta online
function seta_usuario_chat_online(idusuario){

// monta requisicao
$.post(v_pagina_acoes, {uid: idusuario, tipo_pagina_acao: 20}, function(retorno){

if(retorno.length > 0){
	
document.getElementById("id_div_usuario_online_chat_" + idusuario).innerHTML = retorno;
document.getElementById("id_div_usuario_chat_" + idusuario).style.opacity = "1";
document.getElementById("id_div_usuario_online_chat_" + idusuario).style.display = "block";

}else{

document.getElementById("id_div_usuario_online_chat_" + idusuario).innerHTML = "";
document.getElementById("id_div_usuario_chat_" + idusuario).style.opacity = "0.8";
document.getElementById("id_div_usuario_online_chat_" + idusuario).style.display = "none";

};

});

};

