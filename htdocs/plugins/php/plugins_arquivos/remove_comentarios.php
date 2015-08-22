<?php


// remove comentarios
function remove_comentarios($codigo_entrada){


// codigo para limpar
$newStr  = '';
$commentTokens = array(T_COMMENT);
if (defined('T_DOC_COMMENT'))
$commentTokens[] = T_DOC_COMMENT; // PHP 5
if (defined('T_ML_COMMENT'))
$commentTokens[] = T_ML_COMMENT;  // PHP 4
$tokens = token_get_all($codigo_entrada);
foreach ($tokens as $token) {
if (is_array($token)) {
if (in_array($token[0], $commentTokens))
continue;
$token = $token[1];
};
$newStr .= $token;
};


// novo codigo de entrada
$codigo_entrada = $newStr;


// removendo comentarios
$codigo_entrada = preg_replace('!/\*.*?\*/!s', '', $codigo_entrada);
$codigo_entrada = preg_replace('#^\s*//.+$#m', "", $codigo_entrada);
$codigo_entrada = preg_replace('/\n\s*\n/', "\n", $codigo_entrada);


// retorno
return $codigo_entrada; // retorno


};


?>