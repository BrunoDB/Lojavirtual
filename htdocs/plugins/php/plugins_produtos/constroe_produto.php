<?php

// constroe o produto
function constroe_produto($dados){

// globals
global $idioma;
global $pagina_href;

// separa dados
$id = $dados['id'];
$idusuario = $dados['idusuario'];
$idalbum = $dados['idalbum'];
$titulo = $dados['titulo'];
$descricao = $dados['descricao'];
$quantidade = $dados['quantidade'];
$parcelamento = $dados['parcelamento'];
$juros = $dados['juros'];
$preco = $dados['preco'];
$categoria = $dados['categoria'];
$data = $dados['data'];

// id de produto via get
$idproduto = retorne_idproduto_get();

// url do produto
$url_produto = $pagina_href[6].$id;

// valida abrindo produto
if($idproduto != -1){

// campo descricao de produto
$campo_descricao = "
<div class='classe_div_produto_descricao'>$descricao</div>
";

}else{

// limita o tamanho de titulo de produto	
if(strlen($titulo) >= CONFIG_TAMANHO_TITULO_PRODUTO){

// limitando tamanho de titulo
$titulo = substr($titulo, 0, CONFIG_TAMANHO_TITULO_PRODUTO)."...";	

};
	
};

// adiciona quebra de linha
$descricao = str_replace("\n", "<br>", $descricao);

// calcula os juros
$juros_mensal = calcula_juros($preco, $parcelamento, $juros);

// valida se ha juros
if($juros == 0){

// calcula parcela
$valor_parcela = calcula_parcelas($preco, $parcelamento);

// sem juros
$campo_juros_parcelas = "
$valor_parcela $idioma[35]
";

// classe parcelamento
$classe_parcelamento = "classe_numero_parcelamentos_sem_juros";

}else{

// com juros
$campo_juros_parcelas = "
$idioma[39]$juros_mensal$idioma[42]$juros%
";

// classe parcelamento
$classe_parcelamento = "classe_numero_parcelamentos_com_juros";

};

// valida id
if($id == null){

// retorno nulo
return null;
	
};

// imagens do produto
$imagens_produto = constroe_imagens_produto($idalbum);

// linka titulo de produto
$titulo = "<a href='$url_produto' title='$titulo'>$titulo</a>";

// classe do produto
if($idproduto != -1){

$classe_produto = "classe_div_produto_completo";

}else{

$classe_produto = "classe_div_produto";
	
};

// campo de perfil de usuario
$campo_perfil_usuario = constroe_perfil_usuario_produto($idusuario);

// url da categoria
$url_categoria = $pagina_href[9].$categoria;

// campo categoria
$campo_categoria .= $idioma[69];
$campo_categoria .= "<a href='$url_categoria' title='$categoria'>";
$campo_categoria .= $categoria;
$campo_categoria .= "</a>";

// campo compra produto
$campo_compra_produto = campo_comprar_produto($dados);

// campo gerencia produto
$campo_gerencia_produto = campo_gerencia_produto($dados);

// codigo html
$codigo_html = "
<div class='$classe_produto'>

$campo_gerencia_produto

<div class='classe_div_produto_titulo'>$titulo</div>
<div class='classe_div_produto_imagens_produtos'>$imagens_produto</div>
<div class='classe_div_produto_oferta'>
<span class='classe_preco_iten'>
$idioma[32]$preco
</span>
</div>
<span class='$classe_parcelamento'>
$idioma[33]$parcelamento$idioma[34]$campo_juros_parcelas
</span>
<span class='classe_quantidade_itens'>
$idioma[40]$quantidade$idioma[41]
</span>
<span class='classe_categoria_produto'>
$campo_categoria
</span>

$campo_perfil_usuario
$campo_descricao
$campo_compra_produto

</div>
";

// codigo html
return $codigo_html;

};

?>