<?php

// carrega os usuarios do chat
function carrega_usuarios_chat(){

// globals
global $idioma;

// limit
$limit = limit_query();

// tabela
$tabela = TABELA_AMIZADE;

// id de usuario
$idusuario = retorne_idusuario_request();

// query
$query = "select *from $tabela where idamigo='$idusuario' order by id desc $limit;";

// comando
$comando = comando_executa($query);

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// contador
$contador = 0;

// cria lista de usuarios
for($contador == $contador; $contador <= $numero_linhas; $contador++){

// separa dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// codigo html
$codigo_html .= constroe_usuario_chat($dados);

};

// retorno
return $codigo_html;

};

?>