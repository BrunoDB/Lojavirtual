<?php

// codigo html
function campo_configura_perfil_usuario(){

// globals
global $idioma;
global $requeste;

// id de usuario
$idusuario = retorne_idusuario_logado();

// dados do usuario
$dados = dados_perfil_usuario($idusuario);

// separa dados do perfil
$imagem_perfil = $dados['imagem_perfil'];
$imagem_perfil_miniatura = $dados['imagem_perfil_miniatura'];
$nome = $dados['nome'];
$email = $dados['email'];
$cnpj = $dados['cnpj'];
$endereco = $dados['endereco'];
$cidade = $dados['cidade'];
$estado = $dados['estado'];
$telefone = $dados['telefone'];
$celular = $dados['celular'];
$site = $dados['site'];
$categoria = $dados['categoria'];
$sobre = $dados['sobre'];
$cep = $dados['cep'];

// valor de campo hidden
$valor_campo_hidden = PAGINA_ID5;

// url de formulario
$url_formulario = PAGINA_ACOES;

// campo de estados
$campo_estados = gerador_select_option(retorne_array_estados_pais(), $estado, "estado", null, null);

// codigo html
$codigo_html = "
<div class='classe_div_configura_perfil'>
<form action='$url_formulario' method='post' enctype='multipart/form-data'>

<input type='hidden' name='$requeste[5]' value='$valor_campo_hidden'>

<div class='classe_div_configura_perfil_imagem_perfil'>
<div>
<img src='$imagem_perfil' title='$nome' alt='$nome' class='imagem_perfil_usuario'>
</div>

<div>
<input type='file' name='foto' class='campo_file_imagem_perfil' id='id_campo_file_imagem_perfil'>
<input type='button' value='$idioma[62]' class='botao_padrao' onclick='simula_clique_upload_imagem_perfil();'>
</div>
</div>

<div class='classe_div_configura_perfil_campo'>
<span>$idioma[49]</span>
<input type='text' name='nome' value='$nome' required='required' placeholder='$idioma[49]'>
</div>

<div class='classe_div_configura_perfil_campo'>
<span>$idioma[50]</span>
<input type='text' name='email' value='$email' required='required' placeholder='$idioma[50]'>
</div>

<div class='classe_div_configura_perfil_campo'>
<span>$idioma[51]</span>
<input type='text' name='cnpj' value='$cnpj' required='required' placeholder='$idioma[51]'>
</div>

<div class='classe_div_configura_perfil_campo'>
<span>$idioma[52]</span>
<input type='text' name='endereco' value='$endereco' required='required' placeholder='$idioma[52]'>
</div>

<div class='classe_div_configura_perfil_campo'>
<span>$idioma[53]</span>
<input type='text' name='cidade' value='$cidade' required='required' placeholder='$idioma[53]'>
</div>

<div class='classe_div_configura_perfil_campo'>
<span>$idioma[54]</span>
$campo_estados
</div>

<div class='classe_div_configura_perfil_campo'>
<span>$idioma[55]</span>
<input type='text' name='telefone' value='$telefone' required='required' placeholder='$idioma[55]'>
</div>

<div class='classe_div_configura_perfil_campo'>
<span>$idioma[56]</span>
<input type='text' name='celular' value='$celular' required='required' placeholder='$idioma[56]'>
</div>

<div class='classe_div_configura_perfil_campo'>
<span>$idioma[57]</span>
<input type='text' name='site' value='$site' required='required' placeholder='$idioma[57]'>
</div>

<div class='classe_div_configura_perfil_campo'>
<span>$idioma[58]</span>
<input type='text' name='categoria' value='$categoria' required='required' placeholder='$idioma[58]'>
</div>

<div class='classe_div_configura_perfil_campo'>
<span>$idioma[59]</span>
<textarea required='required' placeholder='$idioma[59]' name='sobre'>$sobre</textarea>
</div>

<div class='classe_div_configura_perfil_campo'>
<span>$idioma[60]</span>
<input type='text' name='cep' value='$cep' required='required' placeholder='$idioma[60]'>
</div>

<div class='classe_div_configura_perfil_campo'>
<input type='submit' value='$idioma[61]' class='botao_padrao'>
</div>

</form>
</div>
";

// retorno
return $codigo_html;

};

?>