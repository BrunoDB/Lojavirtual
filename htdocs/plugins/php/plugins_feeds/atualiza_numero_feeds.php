<?php

// atualiza o numero de feeds
function atualiza_numero_feeds($modo){

// modo true adiciona
// modo false remove

// tabela
$tabela = TABELA_SEGUIDORES;

// id de usuario logado
$idusuario_logado = retorne_idusuario_logado();

// query
$query = "select *from $tabela where idusuario='$idusuario_logado';";

// comando executa
$comando = comando_executa($query);

// contador
$contador = 0;

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// atualiza o numero de feeds
for($contador == $contador; $contador <= $numero_linhas; $contador++){

// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// separa dados
$idusuario = $dados['idusuario'];
$idamigo = $dados['idamigo'];

// tabela
$tabela = TABELA_NOTIFICA_FEEDS;

// valida idamigo
if($idamigo != null){

// numero de feeds atual
$numero_feeds = retorne_numero_feeds($idamigo);

// valida numero de feeds
if($numero_feeds == -1){

// zera numero de feeds
$numero_feeds = 0;
	
};

// valida o modo
if($modo == true){

// adiciona
$numero_feeds += 1;

}else{

// remove
$numero_feeds -= 1;

};

// valida numero de feeds
if($numero_feeds == -1){

$numero_feeds = 0;
	
};

// query
$query = "update $tabela set numero_feeds='$numero_feeds' where idusuario='$idamigo';";

// comando executa
comando_executa($query);

};

};

};

?>