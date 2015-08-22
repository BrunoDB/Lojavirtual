<?php

// carregar depois que a pagina estiver carregada
function scripts_js_carregar_onload(){

// codigo html
$codigo_html .= "
\n
<script>
\n
carrega_produtos();
\n
carrega_seguidores();
\n
carrega_feeds();
\n
carrega_usuarios_chat();
\n
carregar_relatorio_vendas(0);
\n
detecta_resolucao_pagina();
\n
</script>
\n
";

// retorno
return $codigo_html;

};

?>