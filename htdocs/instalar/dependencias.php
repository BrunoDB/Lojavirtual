<?php

// lista de arquivos
$lista_dependencias_php = retorne_lista_todos_arquivos(PASTA_PLUGINS, EXTENSAO_1, true);
$lista_dependencias_javascript = retorne_lista_todos_arquivos(PASTA_PLUGINS, EXTENSAO_2, false);
$lista_dependencias_css = retorne_lista_todos_arquivos(PASTA_PLUGINS, EXTENSAO_3, false);

?>