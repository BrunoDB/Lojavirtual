<?php

// retorna array com estados de pais
function retorne_array_estados_pais(){

// globals
global $idioma_disponivel;

switch(retorne_idioma_sessao_usuario()){

// estados brasileiros
case $idioma_disponivel[0]:
$array_retorno[]= "Acre";
$array_retorno[]= "Alagoas";
$array_retorno[]= "Amapá";
$array_retorno[]= "Amazonas";
$array_retorno[]= "Bahia";
$array_retorno[]= "Ceará";
$array_retorno[]= "Distrito Federal";
$array_retorno[]= "Espírito Santo";
$array_retorno[]= "Goiás";
$array_retorno[]= "Maranhão";
$array_retorno[]= "Mato Grosso";
$array_retorno[]= "Mato Grosso do Sul";
$array_retorno[]= "Minas Gerais";
$array_retorno[]= "Pará";
$array_retorno[]= "Paraíba";
$array_retorno[]= "Paraná";
$array_retorno[]= "Pernambuco";
$array_retorno[]= "Piauí";
$array_retorno[]= "Rio de Janeiro";
$array_retorno[]= "Rio Grande do Norte";
$array_retorno[]= "Rio Grande do Sul";
$array_retorno[]= "Rondônia";
$array_retorno[]= "Roraima";
$array_retorno[]= "Santa Catarina";
$array_retorno[]= "São Paulo";
$array_retorno[]= "Sergipe";
$array_retorno[]= "Tocantins";
break;

// estados americanos
case $idioma_disponivel[1]:
$array_retorno[]= "Alabama";
$array_retorno[]= "Alaska";
$array_retorno[]= "Arizona";
$array_retorno[]= "Arkansas";
$array_retorno[]= "California";
$array_retorno[]= "Colorado";
$array_retorno[]= "Connecticut";
$array_retorno[]= "Delaware";
$array_retorno[]= "Florida";
$array_retorno[]= "Georgia";
$array_retorno[]= "Hawaii";
$array_retorno[]= "Idaho";
$array_retorno[]= "Illinois Indiana";
$array_retorno[]= "Iowa";
$array_retorno[]= "Kansas";
$array_retorno[]= "Kentucky";
$array_retorno[]= "Louisiana";
$array_retorno[]= "Maine";
$array_retorno[]= "Maryland";
$array_retorno[]= "Massachusetts";
$array_retorno[]= "Michigan";
$array_retorno[]= "Minnesota";
$array_retorno[]= "Mississippi";
$array_retorno[]= "Missouri";
$array_retorno[]= "Montana Nebraska";
$array_retorno[]= "Nevada";
$array_retorno[]= "New Hampshire";
$array_retorno[]= "New Jersey";
$array_retorno[]= "New Mexico";
$array_retorno[]= "New York";
$array_retorno[]= "North Carolina";
$array_retorno[]= "North Dakota";
$array_retorno[]= "Ohio";
$array_retorno[]= "Oklahoma";
$array_retorno[]= "Oregon";
$array_retorno[]= "Pennsylvania Rhode Island";
$array_retorno[]= "South Carolina";
$array_retorno[]= "South Dakota";
$array_retorno[]= "Tennessee";
$array_retorno[]= "Texas";
$array_retorno[]= "Utah";
$array_retorno[]= "Vermont";
$array_retorno[]= "Virginia";
$array_retorno[]= "Washington";
$array_retorno[]= "West Virginia";
$array_retorno[]= "Wisconsin";
$array_retorno[]= "Wyoming";
break;

// estados brasileiros
default:
$array_retorno[]= "Acre";
$array_retorno[]= "Alagoas";
$array_retorno[]= "Amapá";
$array_retorno[]= "Amazonas";
$array_retorno[]= "Bahia";
$array_retorno[]= "Ceará";
$array_retorno[]= "Distrito Federal";
$array_retorno[]= "Espírito Santo";
$array_retorno[]= "Goiás";
$array_retorno[]= "Maranhão";
$array_retorno[]= "Mato Grosso";
$array_retorno[]= "Mato Grosso do Sul";
$array_retorno[]= "Minas Gerais";
$array_retorno[]= "Pará";
$array_retorno[]= "Paraíba";
$array_retorno[]= "Paraná";
$array_retorno[]= "Pernambuco";
$array_retorno[]= "Piauí";
$array_retorno[]= "Rio de Janeiro";
$array_retorno[]= "Rio Grande do Norte";
$array_retorno[]= "Rio Grande do Sul";
$array_retorno[]= "Rondônia";
$array_retorno[]= "Roraima";
$array_retorno[]= "Santa Catarina";
$array_retorno[]= "São Paulo";
$array_retorno[]= "Sergipe";
$array_retorno[]= "Tocantins";

};

// retorno
return $array_retorno; // retorno

};

?>