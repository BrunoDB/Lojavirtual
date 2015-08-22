<?php

// constroe conteudo de rodape
function constroe_conteudo_rodape(){

// globals
global $idioma;

// nome do desenvolvedor
$nome_desenvolvedor = DESENVOLVEDOR_SISTEMA;

// nome do sistema
$nome_sistema = NOME_SISTEMA;

// localizacao
$localizacao = LOCALIZACAO;

$ano_atual = Date("Y");;

// campo idioma
$campo_idioma = campo_seleciona_idioma();

// codigo html
$codigo_html = "
<div class='classe_div_conteudo_rodape'>

<div class='classe_div_conteudo_rodape_div'>$idioma[127]$nome_desenvolvedor</div>
<div class='classe_div_conteudo_rodape_div'>$idioma[128]$nome_sistema - $ano_atual</div>
<div class='classe_div_conteudo_rodape_div'>$campo_idioma</div>

</div>
";

// retorno
return $codigo_html;

};

?>