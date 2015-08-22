<?php

// retorne se o usuario esta online
function retorne_usuario_online($idusuario){

// tabela
$tabela = TABELA_CONEXAO_USUARIO;

// query
$query = "select *from $tabela where idusuario='$idusuario';";

// dados
$dados = retorne_dados_query($query);

// separa dados
$data_conexao = $dados['data_conexao'];

// valida data de conexao existe
if($data_conexao == null){

return false;

};

// calcula o tempo de diferenca
$tempo_diferenca = diferenca_data_conexao($data_conexao);

// retorno
if($tempo_diferenca <= TEMPO_FICAR_OFFLINE){

// online
return true;

}else{

// offline
return false;

};

};

?>