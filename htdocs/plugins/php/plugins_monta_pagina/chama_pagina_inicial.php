<?php

// chama pagina inicial
function chama_pagina_inicial(){

// pagina index
$index = URL_SERVIDOR;

// redireciona
header("Location: $index");

// sai de qualquer script
die;

};

?>