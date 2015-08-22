<?php

// faz o upload de imagens para o album
function upload_imagens_album(){

// dados formulario
$idalbum = retorne_idalbum_post();

// id de usuario logado
$idusuario = retorne_idusuario_logado();

// data atual
$data_atual = data_atual();

// valida idalbum
if($idalbum == null){
	
$idalbum = md5($idusuario.data_atual());

};

// pasta de upload
$pasta_upload_root = retorne_pasta_usuario($idusuario, 2, true);
$pasta_upload_servidor = retorne_pasta_usuario($idusuario, 2, false);

// array com fotos
$fotos = $_FILES['fotos'];

// numero de imagens
$numero_imagens = retorne_numero_array_post_imagens();

// contador
$contador = 0;

// uploading de imagens
for($contador == $contador; $contador <= $numero_imagens; $contador++){

 // nome imagem
$nome_imagem = $fotos['tmp_name'][$contador];
$nome_imagem_real = $fotos['name'][$contador]; 

// upload da imagem e recebe dados
if($nome_imagem != null){

$dados_imagem = upload_imagem_unica_album($nome_imagem, $nome_imagem_real, $pasta_upload_root, ESCALA_IMAGEM_ALBUM, ESCALA_IMAGEM_ALBUM_MINIATURA, $pasta_upload_servidor, true);

};

// cadastra a imagem no banco de dados
if($nome_imagem != null){

// url de imagem
$url_imagem = $dados_imagem['normal'];
$url_imagem_miniatura = $dados_imagem['miniatura'];

// tabela
$tabela = TABELA_IMAGENS_ALBUM;

// query
$query = "insert into $tabela values(null, '$idusuario', '$idalbum', '$url_imagem', '$url_imagem_miniatura', '$data_atual');";

// comando
comando_executa($query);

};

};

// retorno
return $idalbum;

};

?>