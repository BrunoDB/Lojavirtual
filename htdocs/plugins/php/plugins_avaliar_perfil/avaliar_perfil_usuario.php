<?php

// avalia o perfil do usuario
function avaliar_perfil_usuario(){

// id de usuario
$idusuario = retorne_idusuario_request();

// id de usuario logado
$idusuario_logado = retorne_idusuario_logado();

// tabela
$tabela = TABELA_AVALIAR_PERFIL;

// data
$data = data_atual();

// modo
$modo = remove_html($_REQUEST['modo']);

// query
$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idusuario_logado';";

// numero de linhas
$numero_linhas = retorne_numero_linhas_query($query);

// valida valores de tabela
if($numero_linhas == 0){

// limpa query
$query = array();

// querys
$query[] = "delete from $tabela where idusuario='$idusuario' and idamigo='$idusuario_logado';";
$query[] = "insert into $tabela values('$idusuario', '$idusuario_logado', '0', '0', '0', '$data');";

// executa querys
executador_querys($query);

};

// query
$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idusuario_logado';";

// dados
$dados = retorne_dados_query($query);

// separa dados
$agilidade = $dados['agilidade'];
$atendimento = $dados['atendimento'];
$honestidade = $dados['honestidade'];

// limpa query
$query = array();

// valida o modo
switch($modo){

case 1:
if($agilidade > 0){
$agilidade = 0;
}else{
$agilidade++;
};
break;

case 2:
if($atendimento > 0){
$atendimento = 0;
}else{
$atendimento++;
};
break;

case 3:
if($honestidade > 0){
$honestidade = 0;
}else{
$honestidade++;
};
break;
	
};

// query
$query = "update $tabela set agilidade='$agilidade', atendimento='$atendimento', honestidade='$honestidade' where idusuario='$idusuario' and idamigo='$idusuario_logado';";

// comando executa
comando_executa($query);

};

?>