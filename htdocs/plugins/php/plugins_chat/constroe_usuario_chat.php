<?php

// constroe usuario de chat
function constroe_usuario_chat($dados){

// id de usuario
$idusuario = $dados['idusuario'];

// valida idusuario
if($idusuario == null){

// retorno nulo
return null;

};

// imagem de perfil de usuario
$imagem_perfil = imagem_perfil_chat($idusuario);

// nome de usuario
$nome_usuario = retorne_nome_usuario($idusuario);

// atualiza a lista javascript
$lista_javascript_atualiza_array = atualiza_lista_idusuarios_chat_carregados_javascript($idusuario);

// codigo html
$codigo_html = "
$lista_javascript_atualiza_array
<div class='classe_div_usuario_chat' id='id_div_usuario_chat_$idusuario' onclick='mudar_idusuario_chat($idusuario);'>
<div class='classe_div_imagem_perfil_chat'>$imagem_perfil</div>
<div class='classe_div_usuario_online_chat' id='id_div_usuario_online_chat_$idusuario'></div>
<div class='classe_div_nome_perfil_chat'>$nome_usuario</div>
<div class='classe_div_campo_notificacao_chat_nova_mensagem_usuario'>
<div class='classe_notificacoes_usuario' id='id_notificacao_nova_mensagem_usuario_$idusuario'></div>
</div>
</div>
";

// retorno
return $codigo_html;

};

?>