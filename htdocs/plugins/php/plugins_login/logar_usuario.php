<?php

// logar o usuario
function logar_usuario(){

// globals
global $idioma;

// dados de formulario
$email = remove_html($_REQUEST['email']);
$senha = remove_html($_REQUEST['senha']);

// cifra senha
$senha = cifra_senha_md5($senha);

// tabela
$tabela = TABELA_CADASTRO;

// query
$query = "select *from $tabela where email='$email' and senha='$senha';";

// numero de linhas
if(retorne_numero_linhas_query($query) == 1){

// salva na sessao
salvar_cookies($email, $senha, false);

// aplica o idioma do usuario
aplica_idioma_usuario(retorne_idusuario_email($email));

// usuario cadastrado
return true;

}else{

// salva na sessao
salvar_cookies(null, null, true);

// usuario nao existe
return mensagem_sistema($idioma[13]);

};

};

?>