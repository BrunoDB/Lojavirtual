<?php

// redireciona para o ultimo produto publicado
function redireciona_ultimo_produto_publicado(){

// globals
global $pagina_href;

// id de produto
$idproduto = retorne_ultimo_idproduto_usuario();

// url para redirecionar
$url_redireciona = $pagina_href[6].$idproduto;

// chama pagina especifica
chama_pagina_especifica($url_redireciona);

};

?>