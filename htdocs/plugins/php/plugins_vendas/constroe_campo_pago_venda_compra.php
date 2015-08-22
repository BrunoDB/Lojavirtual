<?php

// constroe o campo pago de venda ou compra
function constroe_campo_pago_venda_compra($dados, $modo){

// globals
global $idioma;

// separa dados
$id = $dados['id'];
$idusuario = $dados['idusuario'];
$idamigo = $dados['idamigo'];
$idproduto = $dados['idproduto'];
$quantidade = $dados['quantidade'];
$preco = $dados['preco'];
$preco_juros = $dados['preco_juros'];
$juros = $dados['juros'];
$data = $dados['data'];
$parcelamento = $dados['parcelamento'];
$preco_mensal = $dados['preco_mensal'];
$venda_concluida = $dados['venda_concluida'];
$pago = $dados['pago'];

// valida modo
if($modo == 1){

// verifica se ja foi pago
if($pago == 0){

// codigo html
$codigo_html = "
<div class='classe_div_produto_nao_pago'>
$idioma[111]
</div>
";

}else{
	
// codigo html
$codigo_html = "
<div class='classe_div_produto_sim_pago'>
$idioma[112]
</div>
";
	
};

};

// valida modo
if($modo == 2){

// verifica se ja foi pago
if($pago == 0){

// conteudo de dialogo
$conteudo_dialogo = "
$idioma[114]
<br>
<br>
<input type='button' value='$idioma[116]' class='botao_padrao_2' onclick='confirmar_pagamento($idproduto, $idamigo);'>
";

// campo dialogo
$campo_dialogo = janela_mensagem_dialogo($idioma[115], $conteudo_dialogo, "id_dialogo_pagou_produto_$idproduto");

// codigo html
$codigo_html = "
<div class='classe_div_produto_sim_pago'>
<input type='button' value='$idioma[113]' class='botao_padrao_2' onclick='dialogo_confirmar_pagamento($idproduto);'>
</div>
$campo_dialogo
";

}else{
	
// codigo html
$codigo_html = "
<div class='classe_div_produto_sim_pago'>
$idioma[117]
</div>
";
};

};

// retorno
return $codigo_html;

};

?>