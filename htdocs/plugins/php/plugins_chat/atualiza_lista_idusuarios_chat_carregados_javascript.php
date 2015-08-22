<?php

// atualiza a lista de usuarios carregados em chat, em tempo de execucao do javascript
function atualiza_lista_idusuarios_chat_carregados_javascript($idusuario){

// codigo html
$codigo_html = "
<script>
v_lista_chat_usuarios[$idusuario] = $idusuario;
</script>
";

// retorno
return $codigo_html;

};

?>