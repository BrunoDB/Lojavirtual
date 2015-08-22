<?php

// retorna os dados do perfil do usuario
function dados_perfil_usuario($idusuario){

// tabelas
$tabela[0] = TABELA_PERFIL;

// query
$query[0] = "select *from $tabela[0] where idusuario='$idusuario';";

// dados
$dados = retorne_dados_query($query[0]);

// verifica se imagem de perfil existe
$imagem_perfil = $dados['imagem_perfil'];
$imagem_perfil_miniatura = $dados['imagem_perfil_miniatura'];

// valida imagens de perfil
if($imagem_perfil == null or $imagem_perfil_miniatura == null){

$dados['imagem_perfil'] = retorne_imagem_servidor(6);
$dados['imagem_perfil_miniatura'] = retorne_imagem_servidor(7);

};

// retorno
return $dados;

};

?>