<?php

// constroe o perfil completo de usuario
function constroe_perfil_completo(){

// globals
global $idioma;

// id de usuario
$idusuario = retorne_idusuario_request();

// dados
$dados = dados_perfil_usuario($idusuario);

// separa dados
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
$data = $dados['data'];

// converte data para amigavel
$data = converte_data_amigavel($data);

// campo seguir
$campo_seguir = campo_seguir_usuario($idusuario);

// codigo html
$codigo_html .= "
<div class='clesse_div_perfil_completo'>

<div>
<img src='$imagem_perfil' title='$nome' alt='$nome' class='imagem_perfil_usuario'>
</div>

<span>
$idioma[49]: $nome
</span>

<span>
$idioma[50]: $email 
</span>

<span>
$idioma[51]: $cnpj
</span>

<span>
$idioma[52]: $endereco
</span>

<span>
$idioma[53]: $cidade
</span>

<span>
$idioma[54]: $estado
</span>

<span>
$idioma[55]: $telefone
</span>

<span>
$idioma[56]: $celular
</span>

<span>
$idioma[57]: $site
</span>

<span>
$idioma[58]: $categoria
</span>

<span>
$idioma[59]: $sobre
</span>

<span>
$idioma[60]: $cep
</span>

<span>
$idioma[65]$data
</span>

</div>
";

// valida seguir usuario
if($campo_seguir != null){

// codigo html
$codigo_html .= "

<div class='clesse_div_perfil_completo_seguir'>
$campo_seguir
</div>

";

};

// retorno
return $codigo_html;

};

?>