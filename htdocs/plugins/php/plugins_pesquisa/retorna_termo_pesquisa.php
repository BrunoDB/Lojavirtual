<?php

// retorna o termo de pesquisa
function retorna_termo_pesquisa(){

// globals
global $requeste;

// retorna o termo de pesquisa
return remove_html($_REQUEST[$requeste[1]]);

};

?>