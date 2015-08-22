<?php

// carrega relatorio de vendas
function carrega_relatorio_vendeu(){

// globals
global $idioma;
global $requeste;

// tabela
$tabela = TABELA_VENDAS;

// idusuario
$idusuario = retorne_idusuario_logado();

// limit de query
$limit_query = limit_query();

// dados de formulario
$tipo_relatorio = remove_html($_REQUEST['tipo_relatorio']);

// tipo de relatorio a ser carregado
switch($tipo_relatorio){

// novas vendas
case 1:
// query
$query = "select *from $tabela where idusuario='$idusuario' and venda_concluida='0' order by id desc $limit_query;";
break;

// vendas concluidas
case 3:
// query
$query = "select *from $tabela where idusuario='$idusuario' and venda_concluida='1' order by id desc $limit_query;";
break;

};

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
$_REQUEST[$requeste[2]] = $idamigo;

// perfil do usuario
$perfil_usuario = constroe_perfil_completo();

// data amigavel
$data = converte_data_amigavel($data);

// valida venda concluida
if($venda_concluida == 0){

// campo concluir venda
$campo_concluir_venda = "
<div class='classe_div_relatorio_venda_separa_campo' id='id_div_campo_conluir_venda_$idproduto'>
<input type='button' value='$idioma[104]' class='botao_padrao_2' onclick='concluir_venda($idproduto, $idamigo, 1, $quantidade);'>
<input type='button' value='$idioma[106]' class='botao_padrao' onclick='concluir_venda($idproduto, $idamigo, 0, $quantidade);'>
</div>
";

}else{
	
// campo concluir venda
$campo_concluir_venda = null;

$campo_concluir_venda .= "<div class='classe_div_relatorio_venda_imagem_1'>";
$campo_concluir_venda .= retorne_imagem_servidor(18);
$campo_concluir_venda .= "</div>";

$campo_concluir_venda .= "<div class='classe_div_relatorio_venda_imagem_1_texto'>";
$campo_concluir_venda .= $idioma[105];
$campo_concluir_venda .= "</div>";

$campo_concluir_venda .= "<div class='classe_div_relatorio_venda_botao_descartar'>";
$campo_concluir_venda .= "<input type='button' value='$idioma[106]' class='botao_padrao' onclick='concluir_venda($idproduto, $idamigo, 0, $quantidade);'>";
$campo_concluir_venda .= "</div>";

};

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
$campo_concluir_venda
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