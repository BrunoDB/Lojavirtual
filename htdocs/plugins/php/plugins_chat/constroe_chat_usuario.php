<?php

// constroe o chat do usuario
function constroe_chat_usuario(){

// globals
global $idioma;

// campo publicar
$campo_publicar = "
<div class='classe_div_chat_publicar'>

<div>
<input type='text' id='id_campo_escrever_mensagem' placeholder='$idioma[83]' onkeydown='if(event.keyCode == 13){envia_mensagem_usuario();}'>
</div>

<div>
<input type='button' class='botao_padrao' value='$idioma[82]' onclick='envia_mensagem_usuario();'>
</div>

</div>
";

// imagem de lixeira
$imagem_lixeira = estado_lixeira();

// conteudo de dialogo de lixeira
$conteudo_dialogo .= $idioma[89];
$conteudo_dialogo .= "<br>";
$conteudo_dialogo .= "<br>";
$conteudo_dialogo .= "<input type='button' class='botao_padrao' value='$idioma[90]' onclick='limpa_mensagem_chat(1);'>";
$conteudo_dialogo .= "&nbsp;";
$conteudo_dialogo .= "<input type='button' class='botao_padrao' value='$idioma[91]' onclick='limpa_mensagem_chat(2);'>";

// campo dialogo lixeira
$campo_dialogo_lixeira = janela_mensagem_dialogo($idioma[88], $conteudo_dialogo, "id_dialogo_limpar_mensagens_chat");

// campo opcoes de chat
$campo_opcoes = "
<div class='classe_div_campo_opcoes_chat'>

<div onclick='dialogo_limpa_mensagem_chat();' id='classe_div_campo_opcoes_chat_lixeira'>
$imagem_lixeira
</div>

</div>
$campo_dialogo_lixeira
";

// codigo html
$codigo_html = "
<div class='classe_div_chat'>

<div class='classe_div_chat_conversa'>

<div class='classe_div_chat_conversa_recebidas' id='id_div_chat_conversa' onscroll='carrega_mensagens_chat();'></div>
$campo_publicar
</div>

$campo_opcoes

<div class='classe_div_chat_usuarios' id='id_div_chat_usuarios' onscroll='carrega_usuarios_chat();'></div>

</div>
";

// retorno
return $codigo_html;

};

?>