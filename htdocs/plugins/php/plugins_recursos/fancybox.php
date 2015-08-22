<?php

// fancybox
function fancybox(){

// pasta de recurso
$pasta_recurso = PASTA_RECURSOS."fancybox/";

// url de scripts
$script[0] = $pasta_recurso."jquery.fancybox.css";
$script[1] = $pasta_recurso."jquery.fancybox.js";

// codigo html
$codigo_html .= "<link rel='stylesheet' href='$script[0]' type='text/css' media='screen'/>";
$codigo_html .= "<script type='text/javascript' src='$script[1]'></script>";
$codigo_html .= "\n";
$codigo_html .= "<script type='text/javascript'>";
$codigo_html .= "$(document).ready(function(){";
$codigo_html .= "$('.fancybox').fancybox();";
$codigo_html .= "});";
$codigo_html .= "</script>";
$codigo_html .= "\n";

// retorno
return $codigo_html;

};

?>