<?php

// carrega as mensagens do chat
function carrega_mensagens_chat(){

// globals
global $idioma;

// limit
$limit_query = limit_query_chat();

// idamigo
$idamigo = retorne_idusuario_chat();

// id de usuario
$idusuario = retorne_idusuario_logado();

// tabela
$tabela = TABELA_CHAT_USUARIO;

// query
$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idamigo' $limit_query;";

// comando
$comando = comando_executa($query);

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// valida numero de linhas
if($numero_linhas == 0){

return null;
	
};

// contador
$contador = 0;

// constroe mensagens
for($contador == $contador; $contador <= $numero_linhas; $contador++){

// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// separa dados
$mensagem = $dados['mensagem'];
$data = $dados['data'];
$idusuario_enviou = $dados['idusuario_enviou'];

// valida idusuario que enviou a mensagem
if($idusuario_enviou != null){

// data amigavel
$data = converte_data_amigavel($data);

// verifica se e o dondo da mensagem
if($idusuario == $idusuario_enviou){

$classe_div = "classe_div_mensagem_1";

}else{
	
$classe_div = "classe_div_mensagem_2";

};

// codigo html	
$codigo_html .= "
<div class='$classe_div'>

<div class='classe_div_conteudo_mensagem_chat'>
$mensagem
</div>

<div class='classe_div_data_mensagem_chat'>
$data
</div>

</div>
";

};
	
};

// retorno
return $codigo_html;

};

?>