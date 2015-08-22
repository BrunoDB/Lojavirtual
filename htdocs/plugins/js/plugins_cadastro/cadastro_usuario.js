
// cadastro de usuario
function cadastro_usuario(){

// email e senha
var email = document.getElementById("id_email_login").value;
var senha = document.getElementById("id_senha_login").value;

// monta requisicao
$.post(v_pagina_acoes, {tipo_pagina_acao: 1, email: email, senha: senha}, function(retorno){

// valida retorno
if(retorno == 1){

location.reload();

}else{
	
// mensagem de retorno
document.getElementById("id_mensagem_login_cadastro").innerHTML = retorno;
	
};


});

};

