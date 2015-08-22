<?php

// retorna o nome do usuario
function retorne_nome_usuario($idusuario){

// dados do usuario
$dados = dados_perfil_usuario($idusuario);

// retorno
return $dados['nome'];

};

?>