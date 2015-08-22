<?php

// upload de imagem de perfil
function upload_imagem_perfil(){

// valida se esta postando imagem de perfil
if($_FILES['foto']['tmp_name'] == null){

// retorno nulo
return null;
	
};

// dados da sessao
$dados_sessao = dados_perfil_usuario(retorne_idusuario_logado());

// id de usuario logado
$idusuario_logado = retorne_idusuario_logado();

// cria pasta se nao existir
$pasta_upload_root = retorne_pasta_usuario($idusuario_logado, 1, true);
$pasta_upload_servidor = retorne_pasta_usuario($idusuario_logado, 1, false);

// upload de imagem
$url_imagem = upload_imagem_unica($pasta_upload_root, TAMANHO_ESCALA_IMG_PERFIL, TAMANHO_ESCALA_IMG_PERFIL_MINIATURA, $pasta_upload_servidor, true);

// urls de imagem
$url_imagem_normal = $url_imagem['normal'];
$url_imagem_normal_miniatura = $url_imagem['miniatura'];

// tabela
$tabela = TABELA_PERFIL;

// id de usuario logado
$idusuario_logado = retorne_idusuario_logado();

// campos a serem atualizados
$campos .= "imagem_perfil='$url_imagem_normal', ";
$campos .= "imagem_perfil_miniatura='$url_imagem_normal_miniatura'";

// query
$query = "update $tabela set $campos where idusuario='$idusuario_logado';";

// comando executa
comando_executa($query);

// enderecos de arquivos antigos
$arquivo_antigo[0] = $pasta_upload_root."/".basename($dados_sessao['imagem_perfil']);
$arquivo_antigo[1] = $pasta_upload_root."/".basename($dados_sessao['imagem_perfil_miniatura']);

// exclui arquivo
exclui_arquivo_unico($arquivo_antigo[0]);
exclui_arquivo_unico($arquivo_antigo[1]);

};

?>