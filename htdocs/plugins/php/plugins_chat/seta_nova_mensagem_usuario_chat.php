<?php

// seta nova mensagem usuario de chat
function seta_nova_mensagem_usuario_chat(){

// id de amigo
$idamigo = remove_html($_REQUEST['idamigo']);

// retorno
return retorne_numero_mensagens_chat_usuario(false, $idamigo);

};

?>