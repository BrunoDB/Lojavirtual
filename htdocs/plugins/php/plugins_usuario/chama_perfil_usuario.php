<?php

// chama perfil de usuario
function chama_perfil_usuario(){

// globals
global $pagina_href;

// redireciona
header("Location: $pagina_href[1]");

};

?>