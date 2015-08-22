<?php

// carrega seguidores de usuario
function carrega_seguidores(){

// globals
global $idioma;

// limit
$limit = limit_query();

// tabela
$tabela = TABELA_SEGUIDORES;

// id de usuario
$idusuario = retorne_idusuario_request();

// query
if(retorne_href_get() == $idioma[77]){

// query
$query = "select *from $tabela where idusuario='$idusuario' $limit;";

// modo
$modo = 1;

};

// query
if(retorne_href_get() == $idioma[76]){

// query
$query = "select *from $tabela where idamigo='$idusuario' $limit;";

// modo
$modo = 2;

};

// comando
$comando = comando_executa($query);

// contador
$contador = 0;

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// constroe seguidores
for($contador == $contador; $contador <= $numero_linhas; $contador++){

// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// constroe seguidores
$codigo_html .= constroe_seguidor_usuario($dados, $modo);

};

// retorno
return $codigo_html;

};

?>