<?php

// carrega relatorio de compras
function carrega_relatorio_comprou(){

// globals
global $idioma;
global $requeste;

// tabela
$tabela = TABELA_VENDAS;

// idusuario
$idusuario = retorne_idusuario_logado();

// limit de query
$limit_query = limit_query();

// query
$query = "select *from $tabela where idamigo='$idusuario' order by id desc $limit_query;";

// contador
$contador = 0;

// comando
$comando = comando_executa($query);

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// contruindo relatorio
for($contador == $contador; $contador <= $numero_linhas; $contador++){

// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// separa dados
$id = $dados['id'];
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

// valida id
if($id != null){

// dados de produto
$dados_produto = retorne_dados_produto($idproduto);

// separa dados de produto
$titulo = $dados_produto['titulo'];

// aplica link sobre titulo de produto
$titulo = constroe_link_idproduto($idproduto, $titulo);

// simula request
$_REQUEST[$requeste[2]] = $dados_produto['idusuario'];

// perfil do usuario
$perfil_usuario = constroe_perfil_completo();

// data amigavel
$data = converte_data_amigavel($data);

// campo cancela compra
$campo_cancelar_compra = "<input type='button' value='$idioma[107]' class='botao_padrao' onclick='cancelar_compra($idproduto);'>";

// codigo html
$codigo_html .= "
<div class='classe_div_relatorio_venda'>

<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[101]</span>$titulo
</div>

<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[93]</span>$quantidade
</div>

<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[32]</span>$preco
</div>

<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[99]</span>$juros
</div>

<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[100]</span>$preco_juros
</div>


<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[102]</span>$parcelamento
</div>

<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[103]</span>$preco_mensal
</div>

<div class='classe_div_relatorio_venda_separa_campo'>
$data
</div>

<div class='classe_div_relatorio_venda_separa_campo'>
$campo_cancelar_compra
</div>

$perfil_usuario

</div>
";
	
};


};

// retorno
return $codigo_html;

};

?>