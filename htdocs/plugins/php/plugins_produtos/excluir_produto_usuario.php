<?php

// excluir produto de usuario
function excluir_produto_usuario(){

// id de produto
$idproduto = retorne_idproduto_get();

// valida usuario dono de produto
if(retorne_usuario_dono_produto($idproduto) == false or $idproduto == null){

// retorno nulo
return null;
	
};

// tabela
$tabela[0] = TABELA_PRODUTO;
$tabela[1] = TABELA_IMAGENS_ALBUM;
$tabela[2] = TABELA_VENDAS;

// id de usuario logado
$idusuario = retorne_idusuario_logado();

// query
$query[0] = "select *from $tabela[0] where id='$idproduto' and idusuario='$idusuario';";

// dados
$dados = retorne_dados_query($query[0]);

// separa os dados
$id = $dados['id'];
$idalbum = $dados['idalbum'];

// valida id
if($id == null){

// retorno nulo
return null;
	
};

// query
$query[1] = "select *from $tabela[1] where idalbum='$idalbum' and idusuario='$idusuario';";
$query[2] = "delete from $tabela[0] where id='$idproduto' and idusuario='$idusuario';";
$query[3] = "delete from $tabela[1] where idalbum='$idalbum' and idusuario='$idusuario';";
$query[4] = "delete from $tabela[2] where idproduto='$idproduto' and idusuario='$idusuario';";

// comando
$comando = comando_executa($query[1]);

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// contador
$contador = 0;

// pasta root de usuario
$pasta_usuario_root = retorne_pasta_usuario($idusuario, 2, true);

// apaga as imagens
for($contador == $contador; $contador <= $numero_linhas; $contador++){

// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// separa os dados
$url_imagem = $dados['url_imagem'];
$url_imagem_miniatura = $dados['url_imagem_miniatura'];

// excluindo imagens
$arquivo[0] = $pasta_usuario_root.basename($url_imagem);
$arquivo[1] = $pasta_usuario_root.basename($url_imagem_miniatura);

// excluindo arquivos
exclui_arquivo_unico($arquivo[0]);
exclui_arquivo_unico($arquivo[1]);

};

// excluindo registros
comando_executa($query[2]);
comando_executa($query[3]);
comando_executa($query[4]);

};

?>