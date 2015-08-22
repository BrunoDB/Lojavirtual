<?php

// upload de imagem unica
function upload_imagem_unica($pasta_upload, $novo_tamanho_imagem, $novo_tamanho_imagem_miniatura, $host_retorno, $upload_miniatura){

// data atual
$data_atual = data_atual();

// array com fotos
$fotos = $_FILES['foto'];

// extensoes de imagens disponiveis
$extensoes_disponiveis[] = ".jpeg";
$extensoes_disponiveis[] = ".jpg";
$extensoes_disponiveis[] = ".png";
$extensoes_disponiveis[] = ".gif";
$extensoes_disponiveis[] = ".bmp";

// nome imagem
$nome_imagem = $fotos['tmp_name'];
$nome_imagem_real = $fotos['name'];

// dimensoes da imagem
$image_info = getimagesize($_FILES["foto"]["tmp_name"]);
$largura_imagem = $image_info[0];
$altura_imagem = $image_info[1];

// extencao
$extensao_imagem = ".".strtolower(pathinfo($nome_imagem_real, PATHINFO_EXTENSION));

// nome final de imagem
$nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem;
$nome_imagem_final_miniatura = md5($nome_imagem_real.$data_atual.$data_atual).$extensao_imagem;

// endereco final de imagem
$endereco_final_salvar_imagem = $pasta_upload.$nome_imagem_final;
$endereco_final_salvar_imagem_miniatura = $pasta_upload.$nome_imagem_final_miniatura;

// informa se a extensao de imagem e permitida
$extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem);

// se nome for valido entao faz upload
if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){


// upload de imagem normal
$image = new SimpleImage();
$image->load($nome_imagem);

// aplica escala
if($largura_imagem > $novo_tamanho_imagem){

$image->resizeToWidth($novo_tamanho_imagem);

};

// salva a imagem grande
$image->save($endereco_final_salvar_imagem);


// upload de miniatura
if($upload_miniatura == true){

$image = new SimpleImage();
$image->load($nome_imagem);

// modo de redimencionar
if($largura_imagem > $novo_tamanho_imagem_miniatura){

$image->resizeToWidth($novo_tamanho_imagem_miniatura);

};

// salva a imagem em miniatura
$image->save($endereco_final_salvar_imagem_miniatura);

};


// array de retorno
$retorno['normal'] = $host_retorno.$nome_imagem_final;
$retorno['miniatura'] = $host_retorno.$nome_imagem_final_miniatura;

// retorno
return $retorno;

};

};

?>