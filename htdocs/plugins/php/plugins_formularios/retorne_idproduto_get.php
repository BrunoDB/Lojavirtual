<?php

// retorna o id de produto modo get
function retorne_idproduto_get(){

// globals
global $requeste;

// retorno
return remove_html($_REQUEST[$requeste[4]]);

};

?>