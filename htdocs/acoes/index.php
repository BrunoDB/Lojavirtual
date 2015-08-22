<?php

// caminho de pasta
$caminho = $_SERVER['DOCUMENT_ROOT']."/servidor/servidor.php";

// adiciona servidor
include_once($caminho);

// carrega dependencias php
include_once(ARQUIVO_PHP);

// conecta ao mysql
conecta_mysql(true);

// tipo de pagina
switch(retorne_href_pagina_acao()){


case PAGINA_ID1:
$conteudo_pagina = cadastro_usuario();
break;


case PAGINA_ID2:
$conteudo_pagina = logar_usuario();
break;


case PAGINA_ID3:
publicar_produto();
redireciona_ultimo_produto_publicado();
break;


case PAGINA_ID4:
$conteudo_pagina = carrega_produtos();
break;


case PAGINA_ID5:
salva_perfil_usuario();
chama_pagina_especifica($pagina_href[7]);
break;


case PAGINA_ID6:
sessao_idioma_atualizar();
break;


case PAGINA_ID7:
$conteudo_pagina = seguir_usuario();
break;


case PAGINA_ID8:
$conteudo_pagina = carrega_seguidores();
break;


case PAGINA_ID9:
$conteudo_pagina = carrega_feeds_usuario();
break;


case PAGINA_ID10:
$conteudo_pagina = notificacao_feeds();
break;


case PAGINA_ID11:
$conteudo_pagina = atualiza_conexao_usuario();
break;


case PAGINA_ID12:
$conteudo_pagina = carrega_usuarios_chat();
break;


case PAGINA_ID13:
$conteudo_pagina = mudar_idusuario_chat();
break;


case PAGINA_ID14:
$conteudo_pagina = envia_mensagem_usuario();
break;


case PAGINA_ID15:
$conteudo_pagina = carrega_mensagens_chat();
break;


case PAGINA_ID16:
$conteudo_pagina = limpa_mensagem_chat();
break;


case PAGINA_ID17:
$conteudo_pagina = estado_lixeira();
break;


case PAGINA_ID18:
$conteudo_pagina = notificacao_novas_mensagens_chat();
break;


case PAGINA_ID19:
$conteudo_pagina = seta_nova_mensagem_usuario_chat();
break;


case PAGINA_ID20:
$conteudo_pagina = seta_usuario_chat_online();
break;


case PAGINA_ID21:
$conteudo_pagina = comprar_produto();
break;


case PAGINA_ID22:
$conteudo_pagina = carregar_relatorio_vendas();
break;


case PAGINA_ID23:
$conteudo_pagina = concluir_venda();
break;


case PAGINA_ID24:
$conteudo_pagina = cancelar_compra();
break;


case PAGINA_ID25:
$conteudo_pagina = confirmar_pagamento();
break;


case PAGINA_ID26:
$conteudo_pagina = avaliar_perfil_usuario();
break;


case PAGINA_ID27:
$conteudo_pagina = excluir_produto_usuario();
break;


case PAGINA_ID28:
$conteudo_pagina = detecta_resolucao_pagina();
break;


case PAGINA_ID29:
$conteudo_pagina = null;
break;


case PAGINA_ID30:
$conteudo_pagina = null;
break;


case PAGINA_ID31:
$conteudo_pagina = null;
break;


case PAGINA_ID32:
$conteudo_pagina = null;
break;


case PAGINA_ID33:
$conteudo_pagina = null;
break;


case PAGINA_ID34:
$conteudo_pagina = null;
break;


case PAGINA_ID35:
$conteudo_pagina = null;
break;


case PAGINA_ID36:
$conteudo_pagina = null;
break;


case PAGINA_ID37:
$conteudo_pagina = null;
break;


case PAGINA_ID38:
$conteudo_pagina = null;
break;


case PAGINA_ID39:
$conteudo_pagina = null;
break;


case PAGINA_ID40:
$conteudo_pagina = null;
break;


case PAGINA_ID41:
$conteudo_pagina = null;
break;


case PAGINA_ID42:
$conteudo_pagina = null;
break;


case PAGINA_ID43:
$conteudo_pagina = null;
break;


case PAGINA_ID44:
$conteudo_pagina = null;
break;


case PAGINA_ID45:
$conteudo_pagina = null;
break;


case PAGINA_ID46:
$conteudo_pagina = null;
break;


case PAGINA_ID47:
$conteudo_pagina = null;
break;


case PAGINA_ID48:
$conteudo_pagina = null;
break;


case PAGINA_ID49:
$conteudo_pagina = null;
break;


case PAGINA_ID50:
$conteudo_pagina = null;
break;


};

// exibe o conteudo
echo $conteudo_pagina;

?>