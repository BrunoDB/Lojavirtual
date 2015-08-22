<?php

// retorna os dados de avalicao de perfil de usuario
function retorne_dados_avaliacao_perfil_usuario($idusuario){

// variaveis de retorno
$agilidade = 0;
$atendimento = 0;
$honestidade = 0;

// tabela
$tabela = TABELA_AVALIAR_PERFIL;

// query
$query = "select *from $tabela where idusuario='$idusuario';";

// comando
$comando = comando_executa($query);

// contador
$contador = 0;

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// fazendo contagem
for($contador == $contador; $contador <= $numero_linhas; $contador++){

// dados
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);

// valida id
if($dados['idusuario'] != null){

// atualiza contadores de retorno
$agilidade += $dados['agilidade'];
$atendimento += $dados['atendimento'];
$honestidade += $dados['honestidade'];
	
};
	
};

// calcula a porcentagem
$agilidade = ($agilidade * 100) / CONFIG_NUM_AVALIA_PERFIL;
$atendimento = ($atendimento * 100) / CONFIG_NUM_AVALIA_PERFIL;
$honestidade = ($honestidade * 100) / CONFIG_NUM_AVALIA_PERFIL;

// atualiza o array de retorno
$array_retorno['agilidade'] = $agilidade;
$array_retorno['atendimento'] = $atendimento;
$array_retorno['honestidade'] = $honestidade;

// retorno
return $array_retorno;

};

?>