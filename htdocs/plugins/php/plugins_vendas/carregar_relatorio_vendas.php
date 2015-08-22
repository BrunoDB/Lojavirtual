<?php

// carrega o relatorio de vendas
function carregar_relatorio_vendas(){

// dados de formulario
$tipo_relatorio = remove_html($_REQUEST['tipo_relatorio']);

// tipo de relatorio a ser carregado
switch($tipo_relatorio){

case 1:
$codigo_html = carrega_relatorio_vendeu();
break;

case 2:
$codigo_html = carrega_relatorio_comprou();
break;	

case 3:
$codigo_html = carrega_relatorio_vendeu();
break;

case 4:
$codigo_html = carrega_relatorio_deve_recebe();
break;

case 5:
$codigo_html = carrega_relatorio_deve_recebe();
break;

default:
$codigo_html = carrega_relatorio_vendeu();

};

// retorno
return $codigo_html;

};

?>