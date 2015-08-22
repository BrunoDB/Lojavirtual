<?php

// salva o perfil do usuario
function salva_perfil_usuario(){

// tabela
$tabela = TABELA_PERFIL;

// idusuario
$idusuario = retorne_idusuario_logado();

// dados do usuario
$dados = dados_perfil_usuario($idusuario);

// id de usuario de dados
$idusuario_dados = $dados['idusuario'];

if($idusuario_dados == null){

// query
$query = "insert into $tabela values('$idusuario', '', '', '', '', '', '', '','', '', '', '', '', '', '', '');";

// comando executa
comando_executa($query);

// limpa querys antigas
$query = array();

};

// upload de imagem de perfil
upload_imagem_perfil();

// dados do usuario
$dados = dados_perfil_usuario($idusuario);

// dados de usuario de banco de dados
$imagem_perfil = $dados['imagem_perfil'];
$imagem_perfil_miniatura = $dados['imagem_perfil_miniatura'];

// dados de formulario
$nome = remove_html($_REQUEST['nome']);
$email = remove_html($_REQUEST['email']);
$cnpj = remove_html($_REQUEST['cnpj']);
$endereco = remove_html($_REQUEST['endereco']);
$cidade = remove_html($_REQUEST['cidade']);
$estado = remove_html($_REQUEST['estado']);
$telefone = remove_html($_REQUEST['telefone']);
$celular = remove_html($_REQUEST['celular']);
$site = remove_html($_REQUEST['site']);
$categoria = remove_html($_REQUEST['categoria']);
$sobre = remove_html($_REQUEST['sobre']);
$cep = remove_html($_REQUEST['cep']);

// ata atual
$data = data_atual();

// querys
$query[] = "delete from $tabela where idusuario='$idusuario';";
$query[] = "insert into $tabela values('$idusuario', '$imagem_perfil', '$imagem_perfil_miniatura', '$nome', '$email', '$cnpj', '$endereco', '$cidade', '$estado', '$telefone', '$celular', '$site', '$categoria', '$sobre', '$cep', '$data');";

// executador de querys
executador_querys($query);

};

?>