<?php

// constroe a pagina de vendas
function constroe_pagina_vendas(){

// globals
global $idioma;

// campo opcoes
$campo_opcoes = "
<select id='id_campo_opcoes_vendas' onchange='carregar_relatorio_vendas(1);'>
<option value='1' selected>$idioma[96]</option>
<option value='2'>$idioma[97]</option>
<option value='3'>$idioma[108]</option>
<option value='4'>$idioma[109]</option>
<option value='5'>$idioma[110]</option>
</select>
";

// codigo html
$codigo_html = "
<div class='classe_div_opcao_pagina_vendas'>

<span>
$idioma[98]
</span>

$campo_opcoes

</div>

<div class='classe_div_vendido_pagina_vendas' id='id_div_vendido_pagina_vendas'></div>

";

// retorno
return $codigo_html;

};

?>