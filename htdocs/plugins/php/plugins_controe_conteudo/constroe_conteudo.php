<?php

// constroe o conteudo
function constroe_conteudo(){

// globals
global $idioma;
global $pagina_href;

// adiciona campo de avaliar perfil
$codigo_html = campo_avaliar_perfil_usuario();

// valida usando href
if(retorne_href_get() == null or retorne_href_get() == $idioma[14]){

// codigo html
$codigo_html .= constroe_pagina_produtos();

// retorno
return $codigo_html;

};

// constro conteudo
switch(retorne_href_get()){

case $idioma[3]:
$codigo_html .= formulario_login();
break;

case $idioma[15]:
// obtem o idioma atual
$idioma_atual = retorne_idioma_sessao_usuario();
// zera cookies, e sessao
salvar_cookies(null, null, true);
// inicia a sessao
session_start();
// conserva o idioma atual
$_SESSION[IDENTIFICADOR_SESSAO_IDIOMA] = $idioma_atual;
chama_pagina_especifica($pagina_href[0]);
break;

case $idioma[14]:
$codigo_html .= constroe_perfil_basico();
break;

case $idioma[17]:
$codigo_html .= campo_publicar_produto($dados);
break;

case $idioma[19]:
$codigo_html .= constroe_pagina_produtos();
break;

case $idioma[48]:
$codigo_html .= campo_configura_perfil_usuario();
break;

case $idioma[63]:
$codigo_html .= constroe_perfil_completo();
break;

case $idioma[76]:
$codigo_html .= constroe_pagina_seguidores();
break;

case $idioma[77]:
$codigo_html .= constroe_pagina_seguidores();
break;

case $idioma[78]:
$codigo_html .= constroe_pagina_feeds();
break;

case $idioma[80]:
$codigo_html .= app_calculadora();
break;

case $idioma[81]:
$codigo_html .= constroe_chat_usuario();
break;

case $idioma[21]:
$codigo_html .= constroe_pagina_vendas();
break;

};

// retorno
return $codigo_html;

};

?>