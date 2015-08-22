<?php

// campo gerencia o produto
function campo_gerencia_produto($dados){

// globals
global $idioma;

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

// valida usuario dono do produto
if(retorne_usuario_dono_produto($id) == false){

// retorno nulo
return null;

};

// imagem de servidor
$imagem_servidor[0] = retorne_imagem_servidor(19);

// campo excluir
$campo_excluir = "
$idioma[125]
<br>
<br>
<input type='button' value='$idioma[126]' class='botao_padrao' onclick='excluir_produto_usuario($id);'>
";

// adiciona o dialogo
$campo_excluir = janela_mensagem_dialogo($idioma[124], $campo_excluir, "id_dialogo_excluir_produto_$id");

// codigo html
$codigo_html = "
<div class='classe_div_gerencia_produto'>
<div onclick='dialogo_excluir_produto($id);'>$imagem_servidor[0]</div>
</div>
$campo_excluir
";

// retorno
return $codigo_html;

};

?>