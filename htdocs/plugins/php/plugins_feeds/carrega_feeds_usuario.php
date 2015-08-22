<?php

// carrega os feeds de usuario
function carrega_feeds_usuario(){

// globals
global $idioma;

// tabelas
$tabela[0] = TABELA_SEGUIDORES;
$tabela[1] = TABELA_PRODUTO;

// campos de tabela
$campos_tabela[1] = TABELA_SEGUIDORES.".idusuario";
$campos_tabela[2] = TABELA_PRODUTO.".idusuario";
$campos_tabela[3] = TABELA_PRODUTO.".id";
$campos_tabela[4] = TABELA_SEGUIDORES.".idamigo";

// idusuario logado
$idusuario = retorne_idusuario_logado();

// limite de query
$limite_query = limit_query();

// query
$query = "select distinct *from $tabela[1] inner join $tabela[0] on $campos_tabela[2]=$campos_tabela[1] and $campos_tabela[4]='$idusuario' order by $campos_tabela[3] desc $limite_query;";

// comando
$comando = comando_executa($query);

// contador
$contador = 0;

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// constroe produtos
for($contador == $contador; $contador <= $numero_linhas; $contador++){

// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// codigo html
$codigo_html .= constroe_produto($dados);

};

// retorno
return $codigo_html;

};

?>