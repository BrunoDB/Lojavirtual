<?php

// estado da lixeira
function estado_lixeira(){

// numero de mensagens
$numero_mensagens = retorne_numero_mensagens_chat(true);

// imagem de lixeira
if($numero_mensagens == 0){

// codigo html
$codigo_html = retorne_imagem_servidor(14);

}else{

// numero de mensagens
$numero_mensagens = retorne_tamanho_resultado($numero_mensagens);

// codigo html
$codigo_html = retorne_imagem_servidor(15);

};

// retorno
return $codigo_html;

};

?>