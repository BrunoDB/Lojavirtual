
// carrega as atualizacoes de chat de usuario
function atualizacoes_chat_usuario(){


// lista com ids de amigos de chat
var idamigos_array = [];

// remove duplicatas
$.each(v_lista_chat_usuarios, function(i, el){
if($.inArray(el, idamigos_array) === -1) idamigos_array.push(el);
});

// separa idamigo de array
for(i = 0; i <= idamigos_array.length; i++){

// idamigo
idamigo = idamigos_array[i];

// valida idamigo
if(idamigo!= null){

// seta se ha nova mensagem de usuario de chat
seta_nova_mensagem_usuario_chat(idamigo);

// seta se o usuario esta online ou offline
seta_usuario_chat_online(idamigo);





	
};
	
};


};

