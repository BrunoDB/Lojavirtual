<?php

// php
foreach($lista_dependencias_php as $arquivo_dependencia){

// conteudo de dependencia php
$conteudo_dependencia_php .= retorna_conteudo_arquivo($arquivo_dependencia);

// remove tag php
$conteudo_dependencia_php = str_replace("<?php", null, $conteudo_dependencia_php);
$conteudo_dependencia_php = str_replace("?>", null, $conteudo_dependencia_php);

};


// adiciona tag php
$conteudo_dependencia_php = "<?php $conteudo_dependencia_php ?>";


// javascript
foreach($lista_dependencias_javascript as $arquivo_dependencia){

// conteudo de dependencia javascript
$conteudo_dependencia_javascript .= retorna_conteudo_arquivo($arquivo_dependencia);

};


// css
foreach($lista_dependencias_css as $arquivo_dependencia){

// conteudo de dependencia css
$conteudo_dependencia_css .= retorna_conteudo_arquivo($arquivo_dependencia);

};


// salva dependencias
salvar_arquivo(ARQUIVO_PHP, $conteudo_dependencia_php);
salvar_arquivo(ARQUIVO_JS, $conteudo_dependencia_javascript);
salvar_arquivo(ARQUIVO_CSS, $conteudo_dependencia_css);


// limpa variaveis
$conteudo_dependencia_php = null;
$conteudo_dependencia_javascript  = null;
$conteudo_dependencia_css = null;
$arquivo_dependencia = null;

?>