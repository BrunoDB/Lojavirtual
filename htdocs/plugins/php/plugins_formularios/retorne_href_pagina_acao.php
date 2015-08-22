<?php

// retorne o href da pagina de acao
function retorne_href_pagina_acao(){

// globals
global $requeste;

// retorno
return remove_html($_REQUEST[$requeste[5]]);

};

?>