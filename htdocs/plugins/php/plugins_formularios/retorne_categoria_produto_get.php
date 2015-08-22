<?php

// retorna a categoria do produto get
function retorne_categoria_produto_get(){

// globals
global $requeste;

// retorno
return remove_html($_REQUEST[$requeste[3]]);

};

?>