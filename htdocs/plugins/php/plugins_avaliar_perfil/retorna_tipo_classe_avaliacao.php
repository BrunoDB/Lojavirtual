<?php

// retorna o tipo de classe de avaliacao
function retorna_tipo_classe_avaliacao($valor){

// valida valor
if($valor < CONFIG_NIVEL_AVALIA_1){
	
return "classe_avaliacao_1";
	
};

// valida valor
if($valor < CONFIG_NIVEL_AVALIA_2 and $valor > CONFIG_NIVEL_AVALIA_1){
	
return "classe_avaliacao_2";	

};

// valida valor
if($valor >= CONFIG_NIVEL_AVALIA_2){
	
return "classe_avaliacao_3";

};

};

?>