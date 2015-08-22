<?php

// campo compra produto
function campo_comprar_produto($dados){

// globals
global $idioma;
global $pagina_href;
global $requeste;

// separa dados
$idusuario = $dados['idusuario'];

// id de usuario logado
$idusuario_logado = retorne_idusuario_logado();

// contador
$contador = 1;

// quantidade
$quantidade = $dados['quantidade'];

// preco do produto
$preco = $dados['preco'];

// id de produto
$id = $dados['id'];

// juros
$juros = $dados['juros'];

// monta array numero de produtos
for($contador == $contador; $contador <= $quantidade; $contador++){

// array de quantidade de produtos
$quantidade_produtos[] = $contador;
	
};

// evento numero de produtos
$evento_numero_produtos = "onchange='calcula_preco_compra($id, $preco, $juros);'";

// campo numero produtos
$campo_numero_produtos = gerador_select_option($quantidade_produtos, 1, null, "id_select_numero_produtos_$id", $evento_numero_produtos);

// imagem de carrinho
$imagem_carrinho = retorne_imagem_servidor(17);

// valida usar juros
if($juros > 0){

// calcula preco com juros
$preco_juros = calcula_juros($preco, 1, $juros);

$campo_preco_juros = "
<div class='div_class_finaliza_compra_produto_div3' id='id_div_preco_finaliza_compra_juros_$id'>R$ $preco_juros</div>
";

};

// verifica se ja comprou o produto
if(retorne_comprou_produto($id) == true){

// imagem comprou
$imagem_comprou = retorne_imagem_servidor(18);

// codigo html
$codigo_html = "
<div class='div_classe_informa_comprou_produto'>

<div class='div_classe_informa_comprou_produto_div1'>
$imagem_comprou
</div>

<div class='div_classe_informa_comprou_produto_div2'>
$idioma[95]
</div>

</div>
";

// retorno
return $codigo_html;

};

// valida usuario logado
if(retorne_usuario_logado() == true and $idusuario_logado != $idusuario){

// codigo html
$codigo_html = "
<div class='classe_div_compra_produto'>

<div class='classe_div_compra_produto_quantidade'>
<span>$idioma[93]</span>
$campo_numero_produtos
</div>

<div class='classe_div_compra_produto_botao'>
<input type='button' value='$idioma[92]' class='botao_padrao_2' onclick='comprar_produto($id);'>
</div>

<div class='div_class_finaliza_compra_produto'>
<div class='div_class_finaliza_compra_produto_div1'>$imagem_carrinho</div>
<div class='div_class_finaliza_compra_produto_div2' id='id_div_preco_finaliza_compra_$id'>R$ $preco</div>
$campo_preco_juros
</div>

</div>
";

};

// valida usuario logado
if(retorne_usuario_logado() == false){

// codigo html
$codigo_html = "
<div class='div_classe_informa_cadastro_comprar_produto'>

<div>
$idioma[94]
</div>

<div>
<a href='$pagina_href[0]&$requeste[4]=$id' title='$idioma[9]' class='botao_padrao_2'>$idioma[9]</a>
</div>

</div>
";

};

// retorno
return $codigo_html;

};

?>