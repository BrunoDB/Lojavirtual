<?php

// diferenca entre datas da conexao
function diferenca_data_conexao($data_comparar){

// retorno
return strtotime(date('Y/m/d H:i:s')) - strtotime($data_comparar);

};

?>