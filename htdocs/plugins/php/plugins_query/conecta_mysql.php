<?php

// conecta ao mysql
function conecta_mysql($seleciona_banco){

// conecta
$conexao = mysql_connect(SERVIDOR_MYSQL, USUARIO_MYSQL, SENHA_MYSQL);

// seleciona banco de dados
if($seleciona_banco == true){

mysql_select_db(BANCO_DADOS);

};

// retorno
return $conexao;

};

?>