<?php

// constroe link de produdo por idproduto
function constroe_link_idproduto($idproduto, $titulo_produto){

// globals
global $pagina_href;

// link de retorno
$link = "<a href='$pagina_href[6]$idproduto' title='$titulo_produto'>$titulo_produto</a>";

// retorno
return $link;

};

?>