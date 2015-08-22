<?php

// retorna o numero de amigos online
function retorne_numero_amigos_online(){

// tabela
$tabela = TABELA_SEGUIDORES;

// idusuario
$idusuario = retorne_idusuario_logado();

// query
$query = "select *from $tabela where idusuario='$idusuario';";

// comando
$comando = comando_executa($query);

// contador
$contador = 0;

// numero de amigos online
$numero_amigos_online = 0;

// numero de linhas de comando
$numero_linhas = retorne_numero_linhas_comando($comando);

// construindo amigos
for($contador == $contador; $contador <= $numero_linhas; $contador++){

// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// idamigo
$idamigo = $dados['idamigo'];

// valida idamigo
if($idamigo != null){

// valida usuario online
if(retorne_usuario_online($idamigo) == true){

// atualiza contador	
$numero_amigos_online++;

};

};

};

// retorno
return $numero_amigos_online;

};

?>