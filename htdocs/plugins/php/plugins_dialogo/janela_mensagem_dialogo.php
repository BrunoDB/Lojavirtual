<?php

// janela de mensagem de dialogo
function janela_mensagem_dialogo($titulo_janela, $conteudo_mensagem, $div_id){

// botao fechar
$botao_fechar .= "<span class='span_botao_fechar_mensagem_dialogo'>";
$botao_fechar .= "<button class='botao_padrao' onclick='fechar_janela_mensagem_dialogo();'>x</button>";
$botao_fechar .= "</span>";

// codigo html bruto
$codigo_html .= "<div id='$div_id' class='div_janela_principal_mensagem_dialogo' ondblclick='fechar_janela_mensagem_dialogo();'>";
$codigo_html .= "<div class='div_janela_mensagem_dialogo'>";
$codigo_html .= "<div class='div_janela_mensagem_dialogo_titulo'>";
$codigo_html .= $botao_fechar;
$codigo_html .= $titulo_janela;
$codigo_html .= "</div>";
$codigo_html .= "<div class='div_janela_mensagem_conteudo'>";
$codigo_html .= $conteudo_mensagem;
$codigo_html .= "</div>";
$codigo_html .= "</div>";
$codigo_html .= "</div>";

// retorno
return $codigo_html;

};

?>