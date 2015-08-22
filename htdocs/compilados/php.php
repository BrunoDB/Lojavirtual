<?php 
function app_calculadora(){
$contador = 0;
for($contador == $contador; $contador <= 9; $contador++){
$botoes_calculadora .= "<input type='button' class='botao_padrao' value='$contador' onclick='adiciona_numero_calculadora($contador);'>";
};
$botoes_aritimetica_calculadora = "
<input type='button' class='botao_padrao' value='+' onclick='adiciona_sinal_calculadora(1);'>
<input type='button' class='botao_padrao' value='-' onclick='adiciona_sinal_calculadora(2);'>
<input type='button' class='botao_padrao' value='/' onclick='adiciona_sinal_calculadora(3);'>
<input type='button' class='botao_padrao' value='*' onclick='adiciona_sinal_calculadora(4);'>
<input type='button' class='botao_padrao' value='.' onclick='adiciona_sinal_calculadora(5);'>
";
$botoes_resultado_calculadora = "
<input type='button' class='botao_padrao' value='=' onclick='calcula_resultado_calculadora(1);'>
<input type='button' class='botao_padrao' value='C' onclick='calcula_resultado_calculadora(2);'>
";
$codigo_html = "
<div class='classe_div_calculadora'>
<div class='classe_div_visor_calculadora' id='id_div_visor_calculadora'>0</div>
<div class='classe_div_botoes_calculadora'>
$botoes_calculadora
</div>
<div class='classe_div_botoes_calculadora'>
$botoes_aritimetica_calculadora
</div>
<div class='classe_div_botoes_calculadora'>
$botoes_resultado_calculadora
</div>
</div>
";
return $codigo_html;
};
function criar_pasta($pasta){
if($pasta != null or is_dir($pasta) == false){
if(file_exists($pasta) == false){
mkdir($pasta, 0777, true); 
};
};
};
function exclui_arquivo_unico($endereco_arquivo){
if($endereco_arquivo != null){
 @unlink($endereco_arquivo);
};
};
function remove_comentarios($codigo_entrada){
$newStr  = '';
$commentTokens = array(T_COMMENT);
if (defined('T_DOC_COMMENT'))
$commentTokens[] = T_DOC_COMMENT; if (defined('T_ML_COMMENT'))
$commentTokens[] = T_ML_COMMENT;  $tokens = token_get_all($codigo_entrada);
foreach ($tokens as $token) {
if (is_array($token)) {
if (in_array($token[0], $commentTokens))
continue;
$token = $token[1];
};
$newStr .= $token;
};
$codigo_entrada = $newStr;
$codigo_entrada = preg_replace('!/\*.*?\*/!s', '', $codigo_entrada);
$codigo_entrada = preg_replace('#^\s*//.+$#m', "", $codigo_entrada);
$codigo_entrada = preg_replace('/\n\s*\n/', "\n", $codigo_entrada);
return $codigo_entrada; 
};
function retorna_conteudo_arquivo($endereco_arquivo){
if($endereco_arquivo != null){
return @file_get_contents($endereco_arquivo);
};
};
function retorne_lista_todas_pastas($endereco_pasta){
$pasta_diretorio = new RecursiveDirectoryIterator($endereco_pasta);
$array_retorno = array();
foreach($pasta_diretorio as $endereco){
if($endereco != null){
$array_retorno[] = $endereco;
};
};
return $array_retorno;
};
function retorne_lista_todos_arquivos($endereco_pasta, $extensao, $auto_include){
$pasta_diretorio = new RecursiveDirectoryIterator($endereco_pasta);
$lista_arquivos = new RecursiveIteratorIterator($pasta_diretorio);
$arquivos_encontrados = array();
foreach ($lista_arquivos as $informacao_arquivo) {
$extensao_arquivo = ".".pathinfo($informacao_arquivo, PATHINFO_EXTENSION);
if($extensao == $extensao_arquivo or $extensao == null){
$endereco_arquivo = $informacao_arquivo->getPathname();
$arquivos_encontrados[] = $endereco_arquivo;
if($auto_include == true){
include_once($endereco_arquivo);
};
};
};
return $arquivos_encontrados;
};
function salvar_arquivo($endereco, $conteudo){
$conteudo = remove_comentarios($conteudo);
$arquivo = fopen($endereco, "w+");
fwrite($arquivo, $conteudo);
fclose($arquivo);
};
function avaliar_perfil_usuario(){
$idusuario = retorne_idusuario_request();
$idusuario_logado = retorne_idusuario_logado();
$tabela = TABELA_AVALIAR_PERFIL;
$data = data_atual();
$modo = remove_html($_REQUEST['modo']);
$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idusuario_logado';";
$numero_linhas = retorne_numero_linhas_query($query);
if($numero_linhas == 0){
$query = array();
$query[] = "delete from $tabela where idusuario='$idusuario' and idamigo='$idusuario_logado';";
$query[] = "insert into $tabela values('$idusuario', '$idusuario_logado', '0', '0', '0', '$data');";
executador_querys($query);
};
$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idusuario_logado';";
$dados = retorne_dados_query($query);
$agilidade = $dados['agilidade'];
$atendimento = $dados['atendimento'];
$honestidade = $dados['honestidade'];
$query = array();
switch($modo){
case 1:
if($agilidade > 0){
$agilidade = 0;
}else{
$agilidade++;
};
break;
case 2:
if($atendimento > 0){
$atendimento = 0;
}else{
$atendimento++;
};
break;
case 3:
if($honestidade > 0){
$honestidade = 0;
}else{
$honestidade++;
};
break;
};
$query = "update $tabela set agilidade='$agilidade', atendimento='$atendimento', honestidade='$honestidade' where idusuario='$idusuario' and idamigo='$idusuario_logado';";
comando_executa($query);
};
function campo_avaliar_perfil_usuario(){
global $idioma;
if(retorne_usuario_logado() == false){
return null;
};
$idusuario = retorne_idusuario_request();
$usuario_dono = retorne_usuario_dono_perfil();
$dados_avaliacao = retorne_dados_avaliacao_perfil_usuario($idusuario);
$agilidade = $dados_avaliacao['agilidade'];
$atendimento = $dados_avaliacao['atendimento'];
$honestidade = $dados_avaliacao['honestidade'];
$tipo_classe[1] = retorna_tipo_classe_avaliacao($agilidade);
$tipo_classe[2] = retorna_tipo_classe_avaliacao($atendimento);
$tipo_classe[3] = retorna_tipo_classe_avaliacao($honestidade);
$codigo_html = "
<div class='classe_div_avaliar_perfil'>
<div class='classe_div_avaliar_perfil_titulo'>$idioma[118]</div>
<div class='classe_div_avaliar_perfil_apresenta_repucacao'>
<div class='$tipo_classe[1]' onclick='avaliar_perfil_usuario(1);'>$agilidade$idioma[122]</div>
<div class='$tipo_classe[2]' onclick='avaliar_perfil_usuario(2);'>$atendimento$idioma[122]</div>
<div class='$tipo_classe[3]' onclick='avaliar_perfil_usuario(3);'>$honestidade$idioma[122]</div>
</div>
<div class='classe_div_avaliar_perfil_apresenta_repucacao'>
<div>$idioma[119]</div>
<div>$idioma[120]</div>
<div>$idioma[121]</div>
</div>
</div>
";
return $codigo_html;
};
function retorna_tipo_classe_avaliacao($valor){
if($valor < CONFIG_NIVEL_AVALIA_1){
return "classe_avaliacao_1";
};
if($valor < CONFIG_NIVEL_AVALIA_2 and $valor > CONFIG_NIVEL_AVALIA_1){
return "classe_avaliacao_2";	
};
if($valor >= CONFIG_NIVEL_AVALIA_2){
return "classe_avaliacao_3";
};
};
function retorne_dados_avaliacao_perfil_usuario($idusuario){
$agilidade = 0;
$atendimento = 0;
$honestidade = 0;
$tabela = TABELA_AVALIAR_PERFIL;
$query = "select *from $tabela where idusuario='$idusuario';";
$comando = comando_executa($query);
$contador = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
if($dados['idusuario'] != null){
$agilidade += $dados['agilidade'];
$atendimento += $dados['atendimento'];
$honestidade += $dados['honestidade'];
};
};
$agilidade = ($agilidade * 100) / CONFIG_NUM_AVALIA_PERFIL;
$atendimento = ($atendimento * 100) / CONFIG_NUM_AVALIA_PERFIL;
$honestidade = ($honestidade * 100) / CONFIG_NUM_AVALIA_PERFIL;
$array_retorno['agilidade'] = $agilidade;
$array_retorno['atendimento'] = $atendimento;
$array_retorno['honestidade'] = $honestidade;
return $array_retorno;
};
function cadastro_usuario(){
global $idioma;
$email = remove_html($_REQUEST['email']);
$senha = remove_html($_REQUEST['senha']);
$senha = cifra_senha_md5($senha);
$numero_erros = 0;
if(verifica_se_email_valido($email) == false){
$mensagem_erro .= "<li>";
$mensagem_erro .= $idioma[11];
$numero_erros++;
};
if(strlen($senha) < TAMANHO_MINIMO_SENHA){
$mensagem_erro .= "<li>";
$mensagem_erro .= $idioma[12];
$numero_erros++;
};
if($numero_erros > 0){
return mensagem_sistema($mensagem_erro);
};
$tabela = TABELA_CADASTRO;
$data = data_atual();
$query[0] = "select *from $tabela where email='$email';";
$query[1] = "insert into $tabela values(null, '$email', '$senha', '$data');";
if(retorne_numero_linhas_query($query[0]) == 1){
return mensagem_sistema($idioma[10]);
};
comando_executa($query[1]);
return true;
};
function campo_cadastro_topo(){
global $idioma;
global $pagina_href;
$codigo_html[0] = "
<div class='classe_div_campo_cadastro_topo'>
<a href='$pagina_href[2]' title='$idioma[15]' class='botao_padrao'>$idioma[15]</a>
</div>
";
$codigo_html[1] = "
<div class='classe_div_campo_cadastro_topo'>
<a href='$pagina_href[0]' title='$idioma[2]' class='botao_padrao'>$idioma[2]</a>
</div>
";
if(retorne_usuario_logado() == true){
return $codigo_html[0];
}else{
return $codigo_html[1];
};
};
function atualiza_lista_idusuarios_chat_carregados_javascript($idusuario){
$codigo_html = "
<script>
v_lista_chat_usuarios[$idusuario] = $idusuario;
</script>
";
return $codigo_html;
};
function carrega_mensagens_chat(){
global $idioma;
$limit_query = limit_query_chat();
$idamigo = retorne_idusuario_chat();
$idusuario = retorne_idusuario_logado();
$tabela = TABELA_CHAT_USUARIO;
$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idamigo' $limit_query;";
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
if($numero_linhas == 0){
return null;
};
$contador = 0;
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$mensagem = $dados['mensagem'];
$data = $dados['data'];
$idusuario_enviou = $dados['idusuario_enviou'];
if($idusuario_enviou != null){
$data = converte_data_amigavel($data);
if($idusuario == $idusuario_enviou){
$classe_div = "classe_div_mensagem_1";
}else{
$classe_div = "classe_div_mensagem_2";
};
$codigo_html .= "
<div class='$classe_div'>
<div class='classe_div_conteudo_mensagem_chat'>
$mensagem
</div>
<div class='classe_div_data_mensagem_chat'>
$data
</div>
</div>
";
};
};
return $codigo_html;
};
function carrega_usuarios_chat(){
global $idioma;
$limit = limit_query();
$tabela = TABELA_AMIZADE;
$idusuario = retorne_idusuario_request();
$query = "select *from $tabela where idamigo='$idusuario' order by id desc $limit;";
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
$contador = 0;
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$codigo_html .= constroe_usuario_chat($dados);
};
return $codigo_html;
};
function constroe_chat_usuario(){
global $idioma;
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
$imagem_lixeira = estado_lixeira();
$conteudo_dialogo .= $idioma[89];
$conteudo_dialogo .= "<br>";
$conteudo_dialogo .= "<br>";
$conteudo_dialogo .= "<input type='button' class='botao_padrao' value='$idioma[90]' onclick='limpa_mensagem_chat(1);'>";
$conteudo_dialogo .= "&nbsp;";
$conteudo_dialogo .= "<input type='button' class='botao_padrao' value='$idioma[91]' onclick='limpa_mensagem_chat(2);'>";
$campo_dialogo_lixeira = janela_mensagem_dialogo($idioma[88], $conteudo_dialogo, "id_dialogo_limpar_mensagens_chat");
$campo_opcoes = "
<div class='classe_div_campo_opcoes_chat'>
<div onclick='dialogo_limpa_mensagem_chat();' id='classe_div_campo_opcoes_chat_lixeira'>
$imagem_lixeira
</div>
</div>
$campo_dialogo_lixeira
";
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
return $codigo_html;
};
function constroe_usuario_chat($dados){
$idusuario = $dados['idusuario'];
if($idusuario == null){
return null;
};
$imagem_perfil = imagem_perfil_chat($idusuario);
$nome_usuario = retorne_nome_usuario($idusuario);
$lista_javascript_atualiza_array = atualiza_lista_idusuarios_chat_carregados_javascript($idusuario);
$codigo_html = "
$lista_javascript_atualiza_array
<div class='classe_div_usuario_chat' id='id_div_usuario_chat_$idusuario' onclick='mudar_idusuario_chat($idusuario);'>
<div class='classe_div_imagem_perfil_chat'>$imagem_perfil</div>
<div class='classe_div_usuario_online_chat' id='id_div_usuario_online_chat_$idusuario'></div>
<div class='classe_div_nome_perfil_chat'>$nome_usuario</div>
<div class='classe_div_campo_notificacao_chat_nova_mensagem_usuario'>
<div class='classe_notificacoes_usuario' id='id_notificacao_nova_mensagem_usuario_$idusuario'></div>
</div>
</div>
";
return $codigo_html;
};
function envia_mensagem_usuario(){
$mensagem = remove_html($_REQUEST['mensagem']);
$idamigo = retorne_idusuario_chat();
$idusuario = retorne_idusuario_logado();
if($mensagem == null or $idamigo == null or $idusuario == null){
return null;
};
$tabela = TABELA_CHAT_USUARIO;
$data = data_atual();
$query[] = "insert into $tabela values(null, '$idusuario', '$idamigo', '$mensagem', '1', '$data', '$idusuario');";
$query[] = "insert into $tabela values(null, '$idamigo', '$idusuario', '$mensagem', '0', '$data', '$idusuario');";
$query[] = "update $tabela set visualizada='1' where idusuario='$idusuario' and idamigo='$idamigo';";
executador_querys($query);
};
function estado_lixeira(){
$numero_mensagens = retorne_numero_mensagens_chat(true);
if($numero_mensagens == 0){
$codigo_html = retorne_imagem_servidor(14);
}else{
$numero_mensagens = retorne_tamanho_resultado($numero_mensagens);
$codigo_html = retorne_imagem_servidor(15);
};
return $codigo_html;
};
function imagem_perfil_chat($idusuario){
$dados = dados_perfil_usuario($idusuario);
$imagem_perfil_miniatura = $dados['imagem_perfil_miniatura'];
$nome = $dados['nome'];
$codigo_html = "<img src='$imagem_perfil_miniatura' alt='$nome' title='$nome' class='classe_imagem_miniatura_perfil'>";
return $codigo_html;
};
function limit_query_chat(){
$contador = remove_html($_REQUEST['contador']);
if($contador <= 0){
$limit_chat = CONFIG_LIMIT_CHAT_INICIO;
}else{
$limit_chat = CONFIG_LIMIT_CHAT;	
};
if($contador <= 0){
$limit_query = "order by id asc limit $limit_chat";
}else{
$limit_query = "order by id desc limit $limit_chat";
};
return $limit_query;
};
function limpa_mensagem_chat(){
$tabela = TABELA_CHAT_USUARIO;
$idusuario = retorne_idusuario_logado();
$idamigo = retorne_idusuario_chat();
$modo = remove_html($_REQUEST['modo']);
if($modo == 1){
$query = "delete from $tabela where idusuario='$idusuario';";
}else{
$query = "delete from $tabela where idusuario='$idusuario' and idamigo='$idamigo';";
};
query_executa($query);
};
function lista_usuarios_chat(){
};
function mudar_idusuario_chat(){
$idusuario = retorne_idusuario_request();
if($idusuario == null){
return null;
};
session_start();
$_SESSION[CONFIG_SESSAO_IDUSUARIO_CHAT] = $idusuario;
};
function notificacao_novas_mensagens_chat(){
return retorne_tamanho_resultado(retorne_numero_mensagens_chat(false));
};
function retorne_idusuario_chat(){
session_start();
return $_SESSION[CONFIG_SESSAO_IDUSUARIO_CHAT];
};
function retorne_numero_mensagens_chat($modo){
$tabela = TABELA_CHAT_USUARIO;
$idusuario = retorne_idusuario_logado();
if($modo == true){
$query = "select *from $tabela where idusuario='$idusuario';";
}else{
$query = "select *from $tabela where idusuario='$idusuario' and visualizada='0';";
};
return retorne_numero_linhas_query($query);
};
function retorne_numero_mensagens_chat_usuario($modo, $idamigo){
$tabela = TABELA_CHAT_USUARIO;
$idusuario = retorne_idusuario_logado();
if($modo == true){
$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idamigo';";
}else{
$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idamigo' and visualizada='0';";
};
return retorne_numero_linhas_query($query);
};
function seta_nova_mensagem_usuario_chat(){
$idamigo = remove_html($_REQUEST['idamigo']);
return retorne_numero_mensagens_chat_usuario(false, $idamigo);
};
function seta_usuario_chat_online(){
$idusuario = retorne_idusuario_request();
$imagem_online = retorne_imagem_servidor(16);
if(retorne_usuario_online($idusuario) == true){
$codigo_html = "
$imagem_online
";
}else{
$codigo_html = null;
};
return $codigo_html;
};
function campo_comprar_produto($dados){
global $idioma;
global $pagina_href;
global $requeste;
$idusuario = $dados['idusuario'];
$idusuario_logado = retorne_idusuario_logado();
$contador = 1;
$quantidade = $dados['quantidade'];
$preco = $dados['preco'];
$id = $dados['id'];
$juros = $dados['juros'];
for($contador == $contador; $contador <= $quantidade; $contador++){
$quantidade_produtos[] = $contador;
};
$evento_numero_produtos = "onchange='calcula_preco_compra($id, $preco, $juros);'";
$campo_numero_produtos = gerador_select_option($quantidade_produtos, 1, null, "id_select_numero_produtos_$id", $evento_numero_produtos);
$imagem_carrinho = retorne_imagem_servidor(17);
if($juros > 0){
$preco_juros = calcula_juros($preco, 1, $juros);
$campo_preco_juros = "
<div class='div_class_finaliza_compra_produto_div3' id='id_div_preco_finaliza_compra_juros_$id'>R$ $preco_juros</div>
";
};
if(retorne_comprou_produto($id) == true){
$imagem_comprou = retorne_imagem_servidor(18);
$codigo_html = "
<div class='div_classe_informa_comprou_produto'>
<div class='div_classe_informa_comprou_produto_div1'>
$imagem_comprou
</div>
<div class='div_classe_informa_comprou_produto_div2'>
$idioma[95]
</div>
</div>
";
return $codigo_html;
};
if(retorne_usuario_logado() == true and $idusuario_logado != $idusuario){
$codigo_html = "
<div class='classe_div_compra_produto'>
<div class='classe_div_compra_produto_quantidade'>
<span>$idioma[93]</span>
$campo_numero_produtos
</div>
<div class='classe_div_compra_produto_botao'>
<input type='button' value='$idioma[92]' class='botao_padrao_2' onclick='comprar_produto($id);'>
</div>
<div class='div_class_finaliza_compra_produto'>
<div class='div_class_finaliza_compra_produto_div1'>$imagem_carrinho</div>
<div class='div_class_finaliza_compra_produto_div2' id='id_div_preco_finaliza_compra_$id'>R$ $preco</div>
$campo_preco_juros
</div>
</div>
";
};
if(retorne_usuario_logado() == false){
$codigo_html = "
<div class='div_classe_informa_cadastro_comprar_produto'>
<div>
$idioma[94]
</div>
<div>
<a href='$pagina_href[0]&$requeste[4]=$id' title='$idioma[9]' class='botao_padrao_2'>$idioma[9]</a>
</div>
</div>
";
};
return $codigo_html;
};
function comprar_produto(){
$tabela = TABELA_VENDAS;
$idproduto = retorne_idproduto_get();
$idamigo = retorne_idusuario_logado();
$idusuario = retorne_idusuario_dono_produto($idproduto);
$quantidade = remove_html($_REQUEST['quantidade']);
$dados_produto = retorne_dados_produto($idproduto);
$preco = $dados_produto['preco'];
$preco_juros = calcula_juros($dados_produto['preco'], 1, $dados_produto['juros']);
$preco_juros *= $quantidade;
$juros = $dados_produto['juros'];
$parcelamento = $dados_produto['parcelamento'];
$valor_mensal = round(($preco_juros / $parcelamento), 2);
if($idproduto == null or $idusuario == null or $idamigo == null or retorne_usuario_logado() == false){
return null;
};
$data = data_atual();
$query[] = "delete from $tabela where idusuario='$idusuario' and idamigo='$idamigo' and idproduto='$idproduto';";
$query[] = "insert into $tabela values(null, '$idusuario', '$idamigo', '$idproduto', '$quantidade', '$preco', '$preco_juros', '$juros', '$parcelamento', '$valor_mensal', '0', '0', '$data');";
executador_querys($query);
};
function retorne_comprou_produto($id){
$tabela = TABELA_VENDAS;
$idusuario = retorne_idusuario_logado();
$query = "select *from $tabela where idamigo='$idusuario' and idproduto='$id';";
if(retorne_numero_linhas_query($query) == 1){
return true;
}else{
return false;
};
};
function atualiza_conexao_usuario(){
$tabela = TABELA_CONEXAO_USUARIO;
$idusuario = retorne_idusuario_logado();
$data_conexao = retorne_data_atual_conexao();
$query[] = "delete from $tabela where idusuario='$idusuario';";
$query[] = "insert into $tabela values('$idusuario','$data_conexao');";
if($idusuario != null){
executador_querys($query);
};
};
function diferenca_data_conexao($data_comparar){
return strtotime(date('Y/m/d H:i:s')) - strtotime($data_comparar);
};
function retorne_data_atual_conexao(){
return date('Y/m/d H:i:s');
};
function retorne_numero_amigos_online(){
$tabela = TABELA_SEGUIDORES;
$idusuario = retorne_idusuario_logado();
$query = "select *from $tabela where idusuario='$idusuario';";
$comando = comando_executa($query);
$contador = 0;
$numero_amigos_online = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$idamigo = $dados['idamigo'];
if($idamigo != null){
if(retorne_usuario_online($idamigo) == true){
$numero_amigos_online++;
};
};
};
return $numero_amigos_online;
};
function retorne_numero_usuarios_online(){
$tabela = TABELA_CADASTRO;
$query = "select *from $tabela;";
$comando = comando_executa($query);
$contador = 0;
$numero_usuarios_online = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$idusuario = $dados['idusuario'];
if($idusuario != null){
if(retorne_usuario_online($idusuario) == true){
$numero_usuarios_online++;
};
};
};
return $numero_usuarios_online;
};
function retorne_usuario_online($idusuario){
$tabela = TABELA_CONEXAO_USUARIO;
$query = "select *from $tabela where idusuario='$idusuario';";
$dados = retorne_dados_query($query);
$data_conexao = $dados['data_conexao'];
if($data_conexao == null){
return false;
};
$tempo_diferenca = diferenca_data_conexao($data_conexao);
if($tempo_diferenca <= TEMPO_FICAR_OFFLINE){
return true;
}else{
return false;
};
};
function constroe_conteudo(){
global $idioma;
global $pagina_href;
$codigo_html = campo_avaliar_perfil_usuario();
if(retorne_href_get() == null or retorne_href_get() == $idioma[14]){
$codigo_html .= constroe_pagina_produtos();
return $codigo_html;
};
switch(retorne_href_get()){
case $idioma[3]:
$codigo_html .= formulario_login();
break;
case $idioma[15]:
$idioma_atual = retorne_idioma_sessao_usuario();
salvar_cookies(null, null, true);
session_start();
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
return $codigo_html;
};
function janela_mensagem_dialogo($titulo_janela, $conteudo_mensagem, $div_id){
$botao_fechar .= "<span class='span_botao_fechar_mensagem_dialogo'>";
$botao_fechar .= "<button class='botao_padrao' onclick='fechar_janela_mensagem_dialogo();'>x</button>";
$botao_fechar .= "</span>";
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
return $codigo_html;
};
function carrega_lista_emoticons(){
$contador = 1;
$prefixo_emoticon = PREFIXO_EMOTICON;
for($contador == $contador; $contador <= NUMERO_EMOTICONS_ATUAL; $contador++){
$conteudo_emoticons .= "<img src='".PASTA_IMAGENS_SISTEMA."$prefixo_emoticon ($contador)".".png' onclick='adiciona_emoticon($contador);' title='$prefixo_emoticon ($contador)'>";
};
$codigo_html .= "<div class='classe_div_emoticons'>";
$codigo_html .= $conteudo_emoticons;
$codigo_html .= "</div>";
return $codigo_html;
};
function converte_codigo_emoticon($conteudo){
$prefixo_emoticon = PREFIXO_EMOTICON;
for($contador == $contador; $contador <= NUMERO_EMOTICONS_ATUAL; $contador++){
$conteudo = str_replace("$prefixo_emoticon ($contador)", "<img src='".PASTA_IMAGENS_SISTEMA."$prefixo_emoticon ($contador)".".png' title='$prefixo_emoticon ($contador)' class='classe_emoticon_usuario'>", $conteudo);
};
return $conteudo;
};
function atualiza_numero_feeds($modo){
$tabela = TABELA_SEGUIDORES;
$idusuario_logado = retorne_idusuario_logado();
$query = "select *from $tabela where idusuario='$idusuario_logado';";
$comando = comando_executa($query);
$contador = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$idusuario = $dados['idusuario'];
$idamigo = $dados['idamigo'];
$tabela = TABELA_NOTIFICA_FEEDS;
if($idamigo != null){
$numero_feeds = retorne_numero_feeds($idamigo);
if($numero_feeds == -1){
$numero_feeds = 0;
};
if($modo == true){
$numero_feeds += 1;
}else{
$numero_feeds -= 1;
};
if($numero_feeds == -1){
$numero_feeds = 0;
};
$query = "update $tabela set numero_feeds='$numero_feeds' where idusuario='$idamigo';";
comando_executa($query);
};
};
};
function carrega_feeds_usuario(){
global $idioma;
$tabela[0] = TABELA_SEGUIDORES;
$tabela[1] = TABELA_PRODUTO;
$campos_tabela[1] = TABELA_SEGUIDORES.".idusuario";
$campos_tabela[2] = TABELA_PRODUTO.".idusuario";
$campos_tabela[3] = TABELA_PRODUTO.".id";
$campos_tabela[4] = TABELA_SEGUIDORES.".idamigo";
$idusuario = retorne_idusuario_logado();
$limite_query = limit_query();
$query = "select distinct *from $tabela[1] inner join $tabela[0] on $campos_tabela[2]=$campos_tabela[1] and $campos_tabela[4]='$idusuario' order by $campos_tabela[3] desc $limite_query;";
$comando = comando_executa($query);
$contador = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$codigo_html .= constroe_produto($dados);
};
return $codigo_html;
};
function constroe_pagina_feeds(){
global $idioma;
zera_numero_feeds();
$codigo_html = "
<div class='classe_div_produtos_usuario' id='id_div_feeds_usuario'></div>
<div class='classe_div_carregar_mais_produtos' onclick='carrega_feeds();'>$idioma[43]</div>
";
return $codigo_html;
};
function inicializa_tabela_feeds(){
$tabela = TABELA_NOTIFICA_FEEDS;
$idusuario = retorne_idusuario_logado();
$query = "select *from $tabela where idusuario='$idusuario';";
$numero_linhas = retorne_numero_linhas_query($query);
if($numero_linhas == 0){
$numero_feeds_usuario = retorne_numero_feeds();
$data = data_atual();
$query = "insert into $tabela values('$idusuario', '$numero_feeds_usuario', '$data');";	
};
comando_executa($query);
};
function retorne_numero_feeds($idusuario){
$tabela = TABELA_NOTIFICA_FEEDS;
if($idusuario == null){
$idusuario = retorne_idusuario_logado();
};
$query = "select *from $tabela where idusuario='$idusuario';";
$dados = retorne_dados_query($query);
$numero_feeds = $dados['numero_feeds'];
if($numero_feeds == null){
$numero_feeds = -1;
};
return $numero_feeds;
};
function zera_numero_feeds(){
$tabela = TABELA_NOTIFICA_FEEDS;
$idusuario = retorne_idusuario_logado();
$query = "update $tabela set numero_feeds='0' where idusuario='$idusuario';";
comando_executa($query);
};
function constroe_formulario($conteudo){
$codigo_html = "
<div class='classe_div_formulario'>$conteudo</div>
";
return $codigo_html;
};
function converte_data_amigavel($data){
global $semana_idioma;
global $mes_extenso_idioma;
global $idioma;
if($data == null){
return null;
};
$data_explode = explode("-", $data); 
if($data_explode[0] == null or $data_explode[1] == null or $data_explode[2] == null){
return null;
};
$time = mktime(0, 0, 0, $data_explode[1]);
$nome_mes = strftime("%b", $time);
$numero_dia = $data_explode[0];
$mes = $nome_mes; $dia = $data_explode[0]; $ano = $data_explode[2]; 
$dia_semana = date('w', mktime(0,0,0, $data_explode[1], $data_explode[0], $data_explode[2]));
$data_completa = $semana_idioma[$dia_semana]." {$dia} $idioma[303] ".$mes_extenso_idioma[$mes]." $idioma[303] {$ano}";
return $data_completa;
};
function formulario_login(){
global $idioma;
if(retorne_usuario_logado() == true){
chama_perfil_usuario();
return null;
};
$codigo_html = "
<div class='classe_mensagem_login_cadastro' id='id_mensagem_login_cadastro'></div>
<span>$idioma[7]</span>
<input type='text' id='id_email_login' placeholder='$idioma[5]' onkeydown='if(event.keyCode == 13){cadastro_usuario();}'>
<input type='password' id='id_senha_login' placeholder='$idioma[6]' onkeydown='if(event.keyCode == 13){cadastro_usuario();}'>
<div>
<input type='button' value='$idioma[4]' class='botao_padrao' onclick='logar_usuario();'>
$idioma[8]
<input type='button' value='$idioma[9]' class='botao_cadastro' onclick='cadastro_usuario();'>
</div>
";
return constroe_formulario($codigo_html);
};
function gerador_select_option($array_options, $valor_atual, $nome, $idcampo, $evento_campo){
foreach($array_options as $valor){
if($valor == $valor_atual){
$codigo_html .= "<option value='$valor' selected>$valor</option>";
}else{
$codigo_html .= "<option value='$valor'>$valor</option>";
};
};
$codigo_html = "<select name='$nome' id='$idcampo' $evento_campo>$codigo_html</select>";
return $codigo_html; 
};
function retorne_categoria_produto_get(){
global $requeste;
return remove_html($_REQUEST[$requeste[3]]);
};
function retorne_href_get(){
global $requeste;
return remove_html($_REQUEST[$requeste[0]]);
};
function retorne_href_pagina_acao(){
global $requeste;
return remove_html($_REQUEST[$requeste[5]]);
};
function retorne_idproduto_get(){
global $requeste;
return remove_html($_REQUEST[$requeste[4]]);
};
function retorne_idusuario_request(){
global $requeste;
$idusuario = remove_html($_REQUEST[$requeste[2]]);
if($idusuario == null){
$idusuario = retorne_idusuario_logado();
};
return $idusuario;
};
function chama_pagina_especifica($pagina){
header("Location: $pagina");
};
function cifra_senha_md5($senha){
if($senha != null and strlen($senha) >= TAMANHO_MINIMO_SENHA){
$senha = md5($senha);
};
return $senha;
};
function data_atual(){
$data_atual = Date("d-m-Y G:i:s");
return $data_atual;
};
function limpa_string($string_limpar, $modo){
switch($modo){
case 1:
return preg_replace("/[^a-zA-Z0-9\s]/", "", $string_limpar);
break;
case 2:
return preg_replace("/[^a-zA-Z0-9]/", "", $string_limpar);
break;
case 3:
return preg_replace("/[^a-zA-Z\s]/", "", $string_limpar);
break;
case 4:
return preg_replace("/[^0-9\s]/", "", $string_limpar);
break;
};
};
function remove_duplicatas_string($conteudo, $separador){
$conteudo = implode("$separador", array_unique(explode("$separador", $conteudo)));;
return $conteudo;
};
function remove_html($codigo_html){
$codigo_html = addslashes($codigo_html);
$codigo_html = strip_tags($codigo_html);
if(verifica_se_email_valido($codigo_html) == true){
$codigo_html = strtolower($codigo_html);
};
return $codigo_html;
};
function remove_linhas_branco($conteudo){
return preg_replace('/\n\s*\n/', "\n", $conteudo);
};
function retorne_array_estados_pais(){
global $idioma_disponivel;
switch(retorne_idioma_sessao_usuario()){
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
return $array_retorno; 
};
function retorne_elemento_array_existe($array_pesquisa, $valor_pesquisa){
if($array_pesquisa == null){
return false;
};
foreach($array_pesquisa as $valor_array){
if($valor_array == $valor_pesquisa){
return true;
};
};
return false;
};
function retorne_imagem_servidor($numero){
global $idioma;
global $pagina_href;
global $requeste;
$nome_sistema = NOME_SISTEMA;
switch($numero){
case 0:
$url_link = PAGINA_INICIAL;
$titulo = NOME_SISTEMA;
break;
case 1:
$url_link = $pagina_href[3];
$titulo = $idioma[16];
break;
case 2:
$url_link = $pagina_href[4]."&".$requeste[2]."=".retorne_idusuario_visualizando();
$titulo = $idioma[18];
break;
case 3:
$url_link = $pagina_href[5];
$titulo = $idioma[20];
break;
case 4:
$titulo = $idioma[22];
$url_link = $pagina_href[14];
break;
case 5:
$url_link = $pagina_href[7];
$titulo = $idioma[47];
break;
case 6:
return PASTA_IMAGENS_SISTEMA."$numero.png";
break;
case 7:
return PASTA_IMAGENS_SISTEMA."$numero.png";
break;
case 8:
$titulo = $idioma[66];
break;
case 9:
$titulo = $idioma[67];
break;
case 10:
$url_link = $pagina_href[11];
$titulo = $idioma[72];
break;
case 11:
$url_link = $pagina_href[10];
$titulo = $idioma[73];
break;
case 12:
$url_link = $pagina_href[12];
$titulo = $idioma[74];
break;
case 13:
$url_link = $pagina_href[13];
$titulo = $idioma[75];
break;
case 14:
$titulo = $idioma[86];
break;
case 15:
$titulo = $idioma[85];
break;
case 16:
$titulo = $idioma[87];
break;
case 17:
$titulo = $idioma[92];
break;
case 19:
$titulo = $idioma[123];
break;
};
if($url_link == null){
$imagem = "<img src='".PASTA_IMAGENS_SISTEMA."$numero.png"."' title='$titulo' $evento>";
}else{
$imagem = "<img src='".PASTA_IMAGENS_SISTEMA."$numero.png"."' title='$titulo' $evento>";
if($evento == null){
$imagem = "<a href='$url_link' title='$titulo'>$imagem</a>";
};
};
return $imagem;
};
function retorne_tamanho_resultado($numero_resultados){
$tamanho_mil = 1000;
$tamanho_milhao = 1000000;
$tamanho_bilhao = 1000000000;
if($numero_resultados == null){
$numero_resultados = 0;
};
if($numero_resultados == 0){
return 0;
};
$retorno = $numero_resultados;
if($numero_resultados >= $tamanho_mil){
$retorno = round($numero_resultados / $tamanho_mil, 2)."k";
};
if($numero_resultados >= $tamanho_milhao){
$retorno = round($numero_resultados / $tamanho_milhao, 2)."mi";
};
if($numero_resultados >= $tamanho_bilhao){
$retorno = round($numero_resultados / $tamanho_bilhao, 2)."bi";
};
return $retorno;
};
function verifica_se_email_valido($email){
$conta = "^[a-zA-Z0-9\._-]+@"; $domino = "[a-zA-Z0-9\._-]+."; $extensao = "([a-zA-Z]{2,4})$"; 
$pattern = $conta.$domino.$extensao;
return ereg($pattern, $email);
};
function aplica_idioma_usuario($idusuario){
$tabela = TABELA_IDIOMA_USUARIO;
$query = "select *from $tabela where idusuario='$idusuario';";
$dados = retorne_dados_query($query);
$idioma_usuario = $dados['idioma_usuario'];
$idioma_atual_sistema = retorne_idioma_sessao_usuario();
if($idioma_usuario != null and $idioma_atual_sistema != $idioma_usuario){
session_start();
$_SESSION[IDENTIFICADOR_SESSAO_IDIOMA] = $idioma_usuario;
};
};
function campo_seleciona_idioma(){
$codigo_html .= "<div class='classe_div_campo_seleciona_idioma'>";
$codigo_html .= "<div onclick='sessao_idioma_atualizar(1);'>";
$codigo_html .= retorne_imagem_servidor(8);
$codigo_html .= "</div>";
$codigo_html .= "<div onclick='sessao_idioma_atualizar(2);'>";
$codigo_html .= retorne_imagem_servidor(9);
$codigo_html .= "</div>";
$codigo_html .= "</div>";
return $codigo_html;
};
function retorne_idioma_sessao_usuario(){
session_start();
return $_SESSION[IDENTIFICADOR_SESSAO_IDIOMA];
};
function sessao_idioma_atualizar(){
global $idioma_disponivel;
$modo = remove_html($_REQUEST['modo']);
session_start();
switch($modo){
case 1:
$idioma_selecionado = $idioma_disponivel[0];
break;
case 2:
$idioma_selecionado = $idioma_disponivel[1];
break;
default:
$idioma_selecionado = $idioma_disponivel[0];
};
$_SESSION[IDENTIFICADOR_SESSAO_IDIOMA] = $idioma_selecionado;
if(retorne_usuario_logado() == false){
return null;
};
$tabela = TABELA_IDIOMA_USUARIO;
$idusuario = retorne_idusuario_logado();
$query[] = "delete from $tabela where idusuario='$idusuario';";
$query[] = "insert into $tabela values('$idusuario', '$idioma_selecionado');";
executador_querys($query);
};
function logar_usuario(){
global $idioma;
$email = remove_html($_REQUEST['email']);
$senha = remove_html($_REQUEST['senha']);
$senha = cifra_senha_md5($senha);
$tabela = TABELA_CADASTRO;
$query = "select *from $tabela where email='$email' and senha='$senha';";
if(retorne_numero_linhas_query($query) == 1){
salvar_cookies($email, $senha, false);
aplica_idioma_usuario(retorne_idusuario_email($email));
return true;
}else{
salvar_cookies(null, null, true);
return mensagem_sistema($idioma[13]);
};
};
function retorne_usuario_logado(){
$email = retorne_email_cookie();
$senha = retorne_senha_cookie();
$tabela = TABELA_CADASTRO;
$query = "select *from $tabela where email='$email' and senha='$senha';";
if(retorne_numero_linhas_query($query) == 1 and $email != null and $senha != null){
return true;
}else{
return false;	
};
};
function mensagem_sistema($mensagem){
$codigo_html .= "<div class='classe_div_mensagem_sistema'>";
$codigo_html .= $mensagem;
$codigo_html .= "</div>";
return $codigo_html;
};
function mensagem_sistema_sucesso($mensagem){
$codigo_html .= "<div class='classe_div_mensagem_sistema_sucesso'>";
$codigo_html .= $mensagem;
$codigo_html .= "</div>";
return $codigo_html;
};
function chama_pagina_inicial(){
$index = URL_SERVIDOR;
header("Location: $index");
die;
};
function constroe_conteudo_pagina(){
global $idioma;
$conteudo_pagina = constroe_conteudo();
$codigo_html .= "<div class='div_conteudo_pagina'>";
$codigo_html .= $conteudo_pagina;
$codigo_html .= "</div>";
return $codigo_html;
};
function constroe_rodape_pagina(){
global $idioma;
$codigo_html .= "<div class='div_rodape_pagina'>";
$codigo_html .= constroe_conteudo_rodape();
$codigo_html .= "</div>";
return $codigo_html;
};
function constroe_tag_body(){
$codigo_html .= "<body onmousemove='' onkeydown=''>";
return $codigo_html;
};
function constroe_topo_pagina(){
global $idioma;
$imagem_logotipo = retorne_imagem_servidor(0);
$logotipo_topo .= "<div class='classe_div_logotipo_topo'>";
$logotipo_topo .= $imagem_logotipo;
$logotipo_topo .= "</div>";
if(retorne_usuario_logado() == true){
$imagem_usuario .= "<div class='classe_div_imagem_perfil_topo'>";
$imagem_usuario .= constroe_imagem_perfil(retorne_idusuario_logado(), false);
$imagem_usuario .= "</div>";
};
$codigo_html .= "<div class='div_topo_pagina'>";
$codigo_html .= $logotipo_topo;
$codigo_html .= $imagem_usuario;
$codigo_html .= campo_cadastro_topo();
$codigo_html .= campo_opcoes_perfil();
$codigo_html .= "</div>";
return $codigo_html;
};
function constroe_variaveis_js_pagina(){
global $pagina_href;
$termo_pesquisa = retorna_termo_pesquisa();
$limit_query = CONFIG_LIMIT_PESQUISA;
$contador -= CONFIG_LIMIT_PESQUISA;
$contador_chat = CONFIG_LIMIT_CHAT;
$idusuario = retorne_idusuario_request();
$href_get = retorne_href_get();
if($idusuario != null){
$campo_uid = "
var v_uid = $idusuario;
";	
}else{
$campo_uid = "
var v_uid = -1;
";
};
$idproduto = retorne_idproduto_get();
if($idproduto == null){
$idproduto = -1;
};
$pagina_inicial = PAGINA_INICIAL;
$categoria_produto = retorne_categoria_produto_get();
$limit_query_chat = CONFIG_LIMIT_CHAT;
$pasta_sons_sistema = PASTA_SONS_SISTEMA;
$endereco_url_produto = $pagina_href[6].retorne_idproduto_get();
$codigo_html .= "<script>";
$codigo_html .= "\n";
$codigo_html .= "var v_pagina_acoes = '".PAGINA_ACOES."';\n";
$codigo_html .= "\n";
$codigo_html .= "var v_contador = $contador;";
$codigo_html .= "\n";
$codigo_html .= "var v_bkp;";
$codigo_html .= "\n";
$codigo_html .= "var v_termo_pesquisa = '$termo_pesquisa';";
$codigo_html .= "\n";
$codigo_html .= "var v_limit_query = $limit_query;";
$codigo_html .= "\n";
$codigo_html .= $campo_uid;
$codigo_html .= "\n";
$codigo_html .= "var v_href = '$href_get';";
$codigo_html .= "\n";
$codigo_html .= "var v_idproduto = $idproduto;";
$codigo_html .= "\n";
$codigo_html .= "var v_pagina_inicial = '$pagina_inicial';";
$codigo_html .= "\n";
$codigo_html .= "var v_categoria_produto = '$categoria_produto';";
$codigo_html .= "\n";
$codigo_html .= "var v_contador_chat = -$contador_chat;";
$codigo_html .= "\n";
$codigo_html .= "var bkp_chat_usuario;";
$codigo_html .= "\n";
$codigo_html .= "var v_limit_query_chat = $limit_query_chat;";
$codigo_html .= "\n";
$codigo_html .= "var v_estado_lixeira_bkp;";
$codigo_html .= "\n";
$codigo_html .= "var v_pasta_sons_sistema = '$pasta_sons_sistema';";
$codigo_html .= "\n";
$codigo_html .= "var v_lista_chat_usuarios = [];";
$codigo_html .= "\n";
$codigo_html .= "var v_endereco_url_produto = '$endereco_url_produto';";
$codigo_html .= "\n";
$codigo_html .= "";
$codigo_html .= "\n";
$codigo_html .= "";
$codigo_html .= "</script>";
return $codigo_html;
};
function monta_pagina(){
global $idioma;
$usar_resolucao = retorna_usar_resolucao();
$autor_pagina = DESENVOLVEDOR_SISTEMA_AUTOR;
$dependencia[0] = "<script type='text/javascript' src='".ARQUIVO_JQUERY."'></script>";
$dependencia[1] = "<link rel='stylesheet' type='text/css' href='".ARQUIVO_CSS_HOST."'/>";
$dependencia[2] = "<script type='text/javascript' src='".ARQUIVO_JS_HOST."'></script>";
$dependencia[3] = "<script type='text/javascript' src='".ARQUIVO_JQUERY_PAGINACAO."'></script>";
$dependencia[4] = "<link rel='stylesheet' type='text/css' href='".ARQUIVO_CSS_RESOLUCAO."'/>";
if($usar_resolucao == false){
$dependencia[4] = null;
};
$titulo_pagina = retorna_titulo_pagina();
$metas_pagina .= "<meta charset='UTF-8'>";
$metas_pagina .= "<meta name='viewport' content='width=device-width'/>";
$metas_pagina .= "<meta name='description' content='$idioma[0]'>";
$metas_pagina .= "<meta name='keywords' content='$idioma[1]'>";
$metas_pagina .= "<meta name='author' content='$autor_pagina'>";
$codigo_html .= "<html>";
$codigo_html .= "<head>";
$codigo_html .= "<title>$titulo_pagina</title>";
$codigo_html .= $dependencia[0];
$codigo_html .= $dependencia[1];
$codigo_html .= $metas_pagina;
$codigo_html .= $dependencia[4];
$codigo_html .= constroe_variaveis_js_pagina();
$codigo_html .= carrega_recursos_cabecalho();
$codigo_html .= "</head>";
$codigo_html .= constroe_tag_body();
$codigo_html .= constroe_topo_pagina();
$codigo_html .= campo_pesquisa();
$codigo_html .= "<div class='classe_div_principal_pagina'>";
$codigo_html .= constroe_conteudo_pagina();
$codigo_html .= constroe_rodape_pagina();
$codigo_html .= "</div>";
$codigo_html .= "</body>";
$codigo_html .= $dependencia[2];
$codigo_html .= $dependencia[3];
$codigo_html .= scripts_js_carregar_onload();
$codigo_html .= carregar_atualizacoes_jquery();
$codigo_html .= "</html>";
$codigo_html = remove_linhas_branco($codigo_html);
return $codigo_html;
};
function retorna_titulo_pagina(){
return NOME_SISTEMA;
};
function scripts_js_carregar_onload(){
$codigo_html .= "
\n
<script>
\n
carrega_produtos();
\n
carrega_seguidores();
\n
carrega_feeds();
\n
carrega_usuarios_chat();
\n
carregar_relatorio_vendas(0);
\n
detecta_resolucao_pagina();
\n
</script>
\n
";
return $codigo_html;
};
function notificacao_feeds(){
inicializa_tabela_feeds();
$numero_feeds = retorne_numero_feeds(null);
if($numero_feeds == 0){
$numero_feeds = -1;
};
return $numero_feeds;
};
function campo_pesquisa(){
global $idioma;
global $requeste;
$url_formulario = PAGINA_INICIAL;
$termo_pesquisa = retorna_termo_pesquisa();
$campo_categorias = gerador_select_option(retorne_array_categorias(), null, $requeste[3], null, null);
$codigo_html = "
<div class='classe_campo_pesquisa'>
<form action='$url_formulario' method='get'>
<div>
<input type='text' name='$requeste[1]' placeholder='$idioma[46]' value='$termo_pesquisa'>
</div>
<div>
<input type='submit' value='$idioma[44]' class='botao_padrao'>
<input type='reset' value='$idioma[45]' class='botao_cadastro'>
$campo_categorias
</div>
</form>
</div>
";
return $codigo_html;
};
function retorna_termo_pesquisa(){
global $requeste;
return remove_html($_REQUEST[$requeste[1]]);
};
function calcula_juros($preco, $parcelas, $juros){
@$juros_calculado = ($preco * $juros) / 100;
@$preco_mes = ($preco + $juros_calculado) / $parcelas;
$preco_mes = round($preco_mes, 2);
return $preco_mes;
};
function calcula_parcelas($preco, $parcelamento){
return @$juros_mensal = round($preco / $parcelamento, 2);
};
function campo_gerencia_produto($dados){
global $idioma;
$id = $dados['id'];
$idusuario = $dados['idusuario'];
$idalbum = $dados['idalbum'];
$titulo = $dados['titulo'];
$descricao = $dados['descricao'];
$quantidade = $dados['quantidade'];
$parcelamento = $dados['parcelamento'];
$juros = $dados['juros'];
$preco = $dados['preco'];
$categoria = $dados['categoria'];
$data = $dados['data'];
if(retorne_usuario_dono_produto($id) == false){
return null;
};
$imagem_servidor[0] = retorne_imagem_servidor(19);
$campo_excluir = "
$idioma[125]
<br>
<br>
<input type='button' value='$idioma[126]' class='botao_padrao' onclick='excluir_produto_usuario($id);'>
";
$campo_excluir = janela_mensagem_dialogo($idioma[124], $campo_excluir, "id_dialogo_excluir_produto_$id");
$codigo_html = "
<div class='classe_div_gerencia_produto'>
<div onclick='dialogo_excluir_produto($id);'>$imagem_servidor[0]</div>
</div>
$campo_excluir
";
return $codigo_html;
};
function campo_publicar_produto($dados){
global $idioma;
global $requeste;
$valor_campo_hidden = PAGINA_ID3;
$url_formulario = PAGINA_ACOES;
$campo_categorias = gerador_select_option(retorne_array_categorias(), null, "categoria", null, null);
$codigo_html = "
<div class='classe_div_publicar_produto'>
<form action='$url_formulario' method='post' enctype='multipart/form-data'>
<input type='hidden' name='$requeste[5]' value='$valor_campo_hidden'>
<div class='classe_div_separa_campos_publica_produto'>
<span>$idioma[24]</span>
<input type='text' required='required' name='titulo' class='classe_campo_titulo_produto_publica'>
</div>
<div class='classe_div_separa_campos_publica_produto'>
<span>$idioma[23]</span>
<textarea cols='10' rows='10' name='descricao' required='required'></textarea>
</div>
<div class='classe_div_separa_campos_publica_produto'>
<span>$idioma[58]</span>
$campo_categorias
</div>
<div class='classe_div_separa_campos_publica_produto'>
<span>$idioma[38]</span>
<input type='number' step='0.1' required='required' name='preco'>
</div>
<div class='classe_div_separa_campos_publica_produto'>
<span>$idioma[25]</span>
<input type='number' required='required' name='quantidade'>
</div>
<div class='classe_div_separa_campos_publica_produto'>
<span>$idioma[26]</span>
<input type='number' required='required' name='parcelamento'>
</div>
<div class='classe_div_separa_campos_publica_produto'>
<span>$idioma[36]</span>
<input type='number' required='required' step='0.1' name='juros' value='0'>
</div>
<div class='classe_div_publicar_produto_imagens'>
<span>$idioma[29]</span>
<input type='file' name='fotos[]' id='elemento_file_campo_publicar' class='campo_file_upload' multiple>
<input type='button' class='botao_cadastro' value='$idioma[27]' onclick='seleciona_imagens_publicacao_usuario();'>
<div class='classe_div_imagens_pre_publicacao' id='div_imagens_pre_publicacao'></div>
</div>
<div class='classe_div_separa_campos_publica_produto'>
<input type='submit' value='$idioma[28]' class='botao_padrao'>
</div>
</form>
</div>
";
return $codigo_html;
};
function carrega_produtos(){
global $idioma;
$tabela = TABELA_PRODUTO;
$limit = "order by id desc ".limit_query();
$termo_pesquisa = retorna_termo_pesquisa();
$idusuario = retorne_idusuario_request();
$usuario_logado = retorne_usuario_logado();
$idproduto = retorne_idproduto_get();
$categoria_produto = retorne_categoria_produto_get();
if(retorne_href_get() == $idioma[19]){
$completa = "where idusuario='$idusuario'";
};
if($termo_pesquisa == null){
$query = "select *from $tabela $completa $limit;";
}else{
$campo_like = "titulo like '% $termo_pesquisa %' or titulo like '$termo_pesquisa %' or titulo like '% $termo_pesquisa' or descricao like '% $termo_pesquisa %' or descricao like '$termo_pesquisa %' or descricao like '% $termo_pesquisa'";
$query = "select *from $tabela where $campo_like $limit;";
};
if($idproduto != -1){
$query = "select *from $tabela where id='$idproduto' $limit;";
};
if($categoria_produto != null){
$query = "select *from $tabela where categoria='$categoria_produto';";
};
$comando = comando_executa($query);
$contador = 0;
for($contador == $contador; $contador <= retorne_numero_linhas_comando($comando); $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$codigo_html .= constroe_produto($dados);
};
return $codigo_html;
};
function constroe_imagens_produto($idalbum){
$tabela = TABELA_IMAGENS_ALBUM;
$limit = CONFIG_NUM_IMAGENS_PRODUTO_BASICO;
$idproduto = retorne_idproduto_get();
if($idproduto != -1){
$query = "select *from $tabela where idalbum='$idalbum';";
}else{
$query = "select *from $tabela where idalbum='$idalbum' limit $limit;";
};
$comando = comando_executa($query);
$contador = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$id = $dados['id'];
$url_imagem = $dados['url_imagem'];
$url_imagem_miniatura = $dados['url_imagem_miniatura'];
if($id != null){
$codigo_html .= "
<a class='fancybox' rel='group' href='$url_imagem'>
<img src='$url_imagem_miniatura'>
</a>
";
};
};
return $codigo_html;
};
function constroe_link_idproduto($idproduto, $titulo_produto){
global $pagina_href;
$link = "<a href='$pagina_href[6]$idproduto' title='$titulo_produto'>$titulo_produto</a>";
return $link;
};
function constroe_pagina_produtos(){
global $idioma;
$codigo_html = "
<div class='classe_div_produtos_usuario' id='id_div_produtos_usuario'></div>
<div class='classe_div_carregar_mais_produtos' onclick='carrega_produtos();'>$idioma[43]</div>
";
return $codigo_html;
};
function constroe_produto($dados){
global $idioma;
global $pagina_href;
$id = $dados['id'];
$idusuario = $dados['idusuario'];
$idalbum = $dados['idalbum'];
$titulo = $dados['titulo'];
$descricao = $dados['descricao'];
$quantidade = $dados['quantidade'];
$parcelamento = $dados['parcelamento'];
$juros = $dados['juros'];
$preco = $dados['preco'];
$categoria = $dados['categoria'];
$data = $dados['data'];
$idproduto = retorne_idproduto_get();
$url_produto = $pagina_href[6].$id;
if($idproduto != -1){
$campo_descricao = "
<div class='classe_div_produto_descricao'>$descricao</div>
";
}else{
if(strlen($titulo) >= CONFIG_TAMANHO_TITULO_PRODUTO){
$titulo = substr($titulo, 0, CONFIG_TAMANHO_TITULO_PRODUTO)."...";	
};
};
$descricao = str_replace("\n", "<br>", $descricao);
$juros_mensal = calcula_juros($preco, $parcelamento, $juros);
if($juros == 0){
$valor_parcela = calcula_parcelas($preco, $parcelamento);
$campo_juros_parcelas = "
$valor_parcela $idioma[35]
";
$classe_parcelamento = "classe_numero_parcelamentos_sem_juros";
}else{
$campo_juros_parcelas = "
$idioma[39]$juros_mensal$idioma[42]$juros%
";
$classe_parcelamento = "classe_numero_parcelamentos_com_juros";
};
if($id == null){
return null;
};
$imagens_produto = constroe_imagens_produto($idalbum);
$titulo = "<a href='$url_produto' title='$titulo'>$titulo</a>";
if($idproduto != -1){
$classe_produto = "classe_div_produto_completo";
}else{
$classe_produto = "classe_div_produto";
};
$campo_perfil_usuario = constroe_perfil_usuario_produto($idusuario);
$url_categoria = $pagina_href[9].$categoria;
$campo_categoria .= $idioma[69];
$campo_categoria .= "<a href='$url_categoria' title='$categoria'>";
$campo_categoria .= $categoria;
$campo_categoria .= "</a>";
$campo_compra_produto = campo_comprar_produto($dados);
$campo_gerencia_produto = campo_gerencia_produto($dados);
$codigo_html = "
<div class='$classe_produto'>
$campo_gerencia_produto
<div class='classe_div_produto_titulo'>$titulo</div>
<div class='classe_div_produto_imagens_produtos'>$imagens_produto</div>
<div class='classe_div_produto_oferta'>
<span class='classe_preco_iten'>
$idioma[32]$preco
</span>
</div>
<span class='$classe_parcelamento'>
$idioma[33]$parcelamento$idioma[34]$campo_juros_parcelas
</span>
<span class='classe_quantidade_itens'>
$idioma[40]$quantidade$idioma[41]
</span>
<span class='classe_categoria_produto'>
$campo_categoria
</span>
$campo_perfil_usuario
$campo_descricao
$campo_compra_produto
</div>
";
return $codigo_html;
};
function excluir_produto_usuario(){
$idproduto = retorne_idproduto_get();
if(retorne_usuario_dono_produto($idproduto) == false or $idproduto == null){
return null;
};
$tabela[0] = TABELA_PRODUTO;
$tabela[1] = TABELA_IMAGENS_ALBUM;
$tabela[2] = TABELA_VENDAS;
$idusuario = retorne_idusuario_logado();
$query[0] = "select *from $tabela[0] where id='$idproduto' and idusuario='$idusuario';";
$dados = retorne_dados_query($query[0]);
$id = $dados['id'];
$idalbum = $dados['idalbum'];
if($id == null){
return null;
};
$query[1] = "select *from $tabela[1] where idalbum='$idalbum' and idusuario='$idusuario';";
$query[2] = "delete from $tabela[0] where id='$idproduto' and idusuario='$idusuario';";
$query[3] = "delete from $tabela[1] where idalbum='$idalbum' and idusuario='$idusuario';";
$query[4] = "delete from $tabela[2] where idproduto='$idproduto' and idusuario='$idusuario';";
$comando = comando_executa($query[1]);
$numero_linhas = retorne_numero_linhas_comando($comando);
$contador = 0;
$pasta_usuario_root = retorne_pasta_usuario($idusuario, 2, true);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$url_imagem = $dados['url_imagem'];
$url_imagem_miniatura = $dados['url_imagem_miniatura'];
$arquivo[0] = $pasta_usuario_root.basename($url_imagem);
$arquivo[1] = $pasta_usuario_root.basename($url_imagem_miniatura);
exclui_arquivo_unico($arquivo[0]);
exclui_arquivo_unico($arquivo[1]);
};
comando_executa($query[2]);
comando_executa($query[3]);
comando_executa($query[4]);
};
function publicar_produto(){
$titulo = remove_html($_REQUEST['titulo']);
$descricao = remove_html($_REQUEST['descricao']);
$categoria = remove_html($_REQUEST['categoria']);
$quantidade = remove_html($_REQUEST['quantidade']);
$parcelamento = remove_html($_REQUEST['parcelamento']);
$juros = remove_html($_REQUEST['juros']);
$preco = remove_html($_REQUEST['preco']);
if($juros == null){
$juros = 0;	
};
$quantidade = valida_valor($quantidade, false);
$parcelamento = valida_valor($parcelamento, false);
$juros = valida_valor($juros, true);
$preco = valida_valor($preco, true);
if($titulo == null or $descricao == null){
return null;
};
if($quantidade === false or $parcelamento === false or $juros === false or $preco === false){
return null;	
};
$tabela = TABELA_PRODUTO;
$data = data_atual();
$idusuario = retorne_idusuario_logado();
$idalbum = upload_imagens_album();
$query = "insert into $tabela values(null, '$idusuario', '$idalbum', '$titulo', '$descricao', '$quantidade', '$parcelamento', '$juros', '$preco', '$categoria', '$data');";
if(retorne_usuario_logado() == true){
comando_executa($query);
atualiza_numero_feeds(true);
};
};
function redireciona_ultimo_produto_publicado(){
global $pagina_href;
$idproduto = retorne_ultimo_idproduto_usuario();
$url_redireciona = $pagina_href[6].$idproduto;
chama_pagina_especifica($url_redireciona);
};
function remove_exclui_produto(){
atualiza_numero_feeds(false);
};
function retorne_array_categorias(){
$tabela = TABELA_CATEGORIAS;
$idioma_atual = retorne_idioma_sessao_usuario();
$query = "select *from $tabela where idioma='$idioma_atual' order by categoria asc;";
$comando = comando_executa($query);
$contador = 0;
$array_categorias = array();
$array_categorias[] = null;
for($contador == $contador; $contador <= retorne_numero_linhas_comando($comando); $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$categoria = $dados['categoria'];
if($categoria != null){
$array_categorias[] = $categoria;
};
};
return $array_categorias;
};
function retorne_dados_produto($id){
$tabela = TABELA_PRODUTO;
$query = "select *from $tabela where id='$id';";
return retorne_dados_query($query);
};
function retorne_idusuario_dono_produto($id){
$tabela = TABELA_PRODUTO;
$query = "select *from $tabela where id='$id';";
$dados = retorne_dados_query($query);
return $dados['idusuario'];
};
function retorne_ultimo_idproduto_usuario(){
$tabela = TABELA_PRODUTO;
$idusuario = retorne_idusuario_logado();
$query = "select *from $tabela where idusuario='$idusuario' order by id desc;";
$dados = retorne_dados_query($query);
return $dados['id'];
};
function retorne_usuario_dono_produto($id){
$idusuario = retorne_idusuario_dono_produto($id);
$idusuario_logado = retorne_idusuario_logado();
if($idusuario == $idusuario_logado){
return true;
}else{
return false;
};
};
function valida_valor($valor, $aceita_float){
if($valor == null){
return false;
};
$valor = str_replace(",", ".", $valor);
$valor = str_replace(" ", null, $valor);
$valor = trim($valor);
if(is_numeric($valor) == false or $valor < 0){
return false;
};
if($aceita_float == false){
$valor = round($valor, 0);	
};
if($aceita_float == true){
$valor = round($valor, 2);	
};
return $valor;
};
function comando_executa($query){
if($query != null){
$comando = mysql_query($query);
}else{
return null;
};
return $comando;
};
function conecta_mysql($seleciona_banco){
$conexao = mysql_connect(SERVIDOR_MYSQL, USUARIO_MYSQL, SENHA_MYSQL);
if($seleciona_banco == true){
mysql_select_db(BANCO_DADOS);
};
return $conexao;
};
function executador_querys($querys_array){
foreach($querys_array as $query_executar){
comando_executa($query_executar);
};
};
function limit_query(){
$contador = remove_html($_REQUEST['contador']);
if($contador == null){
$contador -= CONFIG_LIMIT_PESQUISA;
};
$contador_inicial = $contador + CONFIG_LIMIT_PESQUISA;
$contador_final = $contador_inicial + CONFIG_LIMIT_PESQUISA;
$limit_query = "limit $contador_inicial, $contador_final";
return $limit_query;
};
function query_executa($query){
mysql_query($query);
};
function retorne_dados_query($query){
$comando = comando_executa($query);
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
return $dados;
};
function retorne_numero_linhas_comando($comando){
if($comando == null){
return 0;
};
return mysql_num_rows($comando);
};
function retorne_numero_linhas_query($query){
$comando = comando_executa($query);
return retorne_numero_linhas_comando($comando);
};
function seleciona_banco($banco_dados){
mysql_select_db($banco_dados);
};
function carregar_atualizacoes_jquery(){
global $idioma;
if(retorne_usuario_logado() == false){
return null;
};
$tempo_timer = CONFIG_TIMER;
$campos_notificacoes = "
\n
notificacao_feeds();
\n
";
$campo_conexao_usuario = "
\n
atualiza_conexao_usuario();
\n
";
if(retorne_href_get() == $idioma[81]){
$campo_chat = "
\n
carrega_mensagens_chat();
\n
";
};
$campo_resolucao = "
\n
detecta_resolucao_pagina();
\n
";
$codigo_html .= "
<script>
\n
var variavelTempoAtualizador = setInterval(function(){ AtualizadorTimer() }, $tempo_timer);
\n
function AtualizadorTimer() {
\n
carregar_atualizacoes_jquery();
\n
};
\n
\n
function carregar_atualizacoes_jquery(){
\n
$campos_notificacoes
$campo_conexao_usuario
$campo_chat
$campo_resolucao
estado_lixeira();
notificacao_novas_mensagens_chat();
atualizacoes_chat_usuario();
\n
};
\n
</script>
\n
";
return $codigo_html;
};
function carrega_recursos_cabecalho(){
$codigo_html .= fancybox();
return $codigo_html;
};
function fancybox(){
$pasta_recurso = PASTA_RECURSOS."fancybox/";
$script[0] = $pasta_recurso."jquery.fancybox.css";
$script[1] = $pasta_recurso."jquery.fancybox.js";
$codigo_html .= "<link rel='stylesheet' href='$script[0]' type='text/css' media='screen'/>";
$codigo_html .= "<script type='text/javascript' src='$script[1]'></script>";
$codigo_html .= "\n";
$codigo_html .= "<script type='text/javascript'>";
$codigo_html .= "$(document).ready(function(){";
$codigo_html .= "$('.fancybox').fancybox();";
$codigo_html .= "});";
$codigo_html .= "</script>";
$codigo_html .= "\n";
return $codigo_html;
};
function detecta_resolucao_pagina(){
$largura_nova = remove_html($_REQUEST['largura']);
$largura_atual = $_SESSION[DETECTOR_SESSAO_TAMANHO_RESOLUCAO];
session_start();
if($largura_atual == null){
$largura_atual = TAMANHO_RESOLUCAO_PADRAO;
$_SESSION[DETECTOR_SESSAO_TAMANHO_RESOLUCAO] = TAMANHO_RESOLUCAO_PADRAO;
};
if($largura_atual < TAMANHO_RESOLUCAO_PADRAO){
$_SESSION[USAR_RESOLUCAO_SISTEMA] = true;
}else{
$_SESSION[USAR_RESOLUCAO_SISTEMA] = false;
};
if($largura_nova != $largura_atual){
$_SESSION[DETECTOR_SESSAO_TAMANHO_RESOLUCAO] = $largura_nova;
return 1;
}else{
return -1;	
};
};
function retorna_usar_resolucao(){
session_start();
return $_SESSION[USAR_RESOLUCAO_SISTEMA];
};
function constroe_conteudo_rodape(){
global $idioma;
$nome_desenvolvedor = DESENVOLVEDOR_SISTEMA;
$nome_sistema = NOME_SISTEMA;
$localizacao = LOCALIZACAO;
$ano_atual = Date("Y");;
$campo_idioma = campo_seleciona_idioma();
$codigo_html = "
<div class='classe_div_conteudo_rodape'>
<div class='classe_div_conteudo_rodape_div'>$idioma[127]$nome_desenvolvedor</div>
<div class='classe_div_conteudo_rodape_div'>$idioma[128]$nome_sistema - $ano_atual</div>
<div class='classe_div_conteudo_rodape_div'>$campo_idioma</div>
</div>
";
return $codigo_html;
};
function campo_seguir_usuario($idamigo){
global $idioma;
if(retorne_usuario_logado() == false){
return null;
};
$idusuario = retorne_idusuario_logado();
$usuario_seguindo = retorne_usuario_seguindo($idusuario, $idamigo);
if($usuario_seguindo == null){
return null;
};
$numero_seguidores = retorne_numero_seguidores($idamigo);
switch($usuario_seguindo){
case 1:
$botao_seguir = "<input type='button' value='$idioma[71] $numero_seguidores' class='botao_padrao' onclick='seguir_usuario($idamigo);'>";
break;
case 2:
$botao_seguir = "<input type='button' value='$idioma[70] $numero_seguidores' class='botao_cadastro' onclick='seguir_usuario($idamigo);'>";
break;
};
$codigo_html = "
<div class='classe_div_campo_seguir'>
<div>
$botao_seguir
</div>
</div>
";
return $codigo_html;
};
function carrega_seguidores(){
global $idioma;
$limit = limit_query();
$tabela = TABELA_SEGUIDORES;
$idusuario = retorne_idusuario_request();
if(retorne_href_get() == $idioma[77]){
$query = "select *from $tabela where idusuario='$idusuario' $limit;";
$modo = 1;
};
if(retorne_href_get() == $idioma[76]){
$query = "select *from $tabela where idamigo='$idusuario' $limit;";
$modo = 2;
};
$comando = comando_executa($query);
$contador = 0;
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$codigo_html .= constroe_seguidor_usuario($dados, $modo);
};
return $codigo_html;
};
function constroe_pagina_seguidores(){
global $idioma;
$tabela = TABELA_SEGUIDORES;
$idusuario = retorne_idusuario_request();
if(retorne_href_get() == $idioma[77]){
$query = "select *from $tabela where idusuario='$idusuario';";
$campo_seguidores = $idioma[72];
};
if(retorne_href_get() == $idioma[76]){
$query = "select *from $tabela where idamigo='$idusuario';";
$campo_seguidores = $idioma[71];
};
$numero_seguidores = retorne_numero_linhas_query($query);
$numero_seguidores = retorne_tamanho_resultado($numero_seguidores);
$codigo_html = "
<div class='classe_div_seguidores_usuario_numero'>
$campo_seguidores
$numero_seguidores
</div>
<div class='classe_div_seguidores_usuario' id='id_div_seguidores_usuario'></div>
<div class='classe_div_carregar_mais_seguidores' onclick='carrega_seguidores();'>$idioma[79]</div>
";
return $codigo_html;
};
function constroe_seguidor_usuario($dados, $modo){
$idusuario = $dados['idusuario'];
$idamigo = $dados['idamigo'];
$data = $dados['data'];
if($idusuario == null or $idamigo == null){
return null;
};
if($modo == 2){
$idamigo = $idusuario;
};
$url_perfil_usuario = retorne_url_perfil_usuario($idamigo);
$imagem_usuario = constroe_imagem_perfil($idamigo, false);
$nome_usuario = retorne_nome_usuario($idamigo);
$nome_usuario = "<a href='$url_perfil_usuario' title='$nome_usuario'>$nome_usuario</a>";
$campo_seguir = campo_seguir_usuario($idamigo);
$codigo_html = "
<div class='classe_div_seguidor_usuario'>
<div class='classe_div_seguidor_usuario_imagem'>
$imagem_usuario
</div>
<div class='classe_div_seguidor_usuario_nome'>
$nome_usuario
</div>
<div class='classe_div_seguidor_usuario_botao'>
$campo_seguir
</div>
</div>
";
return $codigo_html;
};
function retorne_numero_seguidores($idusuario){
$tabela = TABELA_SEGUIDORES;
$query = "select *from $tabela where idusuario='$idusuario';";
return retorne_tamanho_resultado(retorne_numero_linhas_query($query));
};
function retorne_usuario_seguindo($idamigo, $idusuario){
$tabela = TABELA_SEGUIDORES;
if($idamigo == $idusuario){
return null;
};
$query = "select *from $tabela where idusuario='$idusuario' and idamigo='$idamigo';";
if(retorne_numero_linhas_query($query) == 1){
return 1;
}else{
return 2;
};
};
function seguir_usuario(){
global $requeste;
if(retorne_usuario_logado() == false){
return false;
};
$tabela[0] = TABELA_SEGUIDORES;
$tabela[1] = TABELA_AMIZADE;
$idamigo = remove_html($_REQUEST[$requeste[2]]);
$idusuario = retorne_idusuario_logado();
$usuario_seguindo = retorne_usuario_seguindo($idusuario, $idamigo);
if($usuario_seguindo == null or $idamigo == null or $idusuario == null){
return null;
};
$data = data_atual();
switch($usuario_seguindo){
case 1: $query[] = "delete from $tabela[0] where idusuario='$idamigo' and idamigo='$idusuario';";
$query[] = "delete from $tabela[1] where idusuario='$idamigo' and idamigo='$idusuario';";
$query[] = "delete from $tabela[1] where idusuario='$idusuario' and idamigo='$idamigo';";
break;
case 2: $query[] = "delete from $tabela[0] where idusuario='$idamigo' and idamigo='$idusuario';";
$query[] = "insert into $tabela[0] values(null, '$idamigo', '$idusuario', '$data');";
$query[] = "delete from $tabela[1] where idusuario='$idamigo' and idamigo='$idusuario';";
$query[] = "delete from $tabela[1] where idusuario='$idusuario' and idamigo='$idamigo';";
$query[] = "insert into $tabela[1] values(null, '$idamigo', '$idusuario', '$data');";
$query[] = "insert into $tabela[1] values(null, '$idusuario', '$idamigo', '$data');";
break;	
};
executador_querys($query);
};
function retorne_email_cookie(){
return retorne_valor_cookie(CONFIG_NOME_COOKIE_EMAIL);
};
function retorne_senha_cookie(){
return retorne_valor_cookie(CONFIG_NOME_COOKIE_SENHA);
};
function retorne_valor_cookie($nome_cookie){
return $_COOKIE[$nome_cookie];
};
function salvar_cookies($email, $senha, $limpa){
session_start();
$tempo_vida = time() + (COOKIES_DIAS_EXISTE * 24 * 3600);
setcookie(CONFIG_NOME_COOKIE_EMAIL, $email, $tempo_vida, "/");
setcookie(CONFIG_NOME_COOKIE_SENHA, $senha, $tempo_vida, "/");
$_SESSION[CONFIG_NOME_COOKIE_EMAIL] = $email;
$_SESSION[CONFIG_NOME_COOKIE_SENHA] = $senha;
if($limpa == true){
$_SESSION = array();
session_destroy();
};
};
function retorne_idalbum_post(){
global $idioma;
return remove_html($_REQUEST[$idioma[31]]);
};
function retorne_numero_array_post_imagens(){
$contador = 0;
foreach($_FILES['fotos']['tmp_name'] as $nome){
if($nome != null){
$contador++;
};
};
return $contador;
};
class SimpleImage {
   var $image;
   var $image_type;
   function load($filename) {
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image);
      }
   }
   function getWidth() {
      return imagesx($this->image);
   }
   function getHeight() {
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }      
}
function upload_imagem_perfil(){
if($_FILES['foto']['tmp_name'] == null){
return null;
};
$dados_sessao = dados_perfil_usuario(retorne_idusuario_logado());
$idusuario_logado = retorne_idusuario_logado();
$pasta_upload_root = retorne_pasta_usuario($idusuario_logado, 1, true);
$pasta_upload_servidor = retorne_pasta_usuario($idusuario_logado, 1, false);
$url_imagem = upload_imagem_unica($pasta_upload_root, TAMANHO_ESCALA_IMG_PERFIL, TAMANHO_ESCALA_IMG_PERFIL_MINIATURA, $pasta_upload_servidor, true);
$url_imagem_normal = $url_imagem['normal'];
$url_imagem_normal_miniatura = $url_imagem['miniatura'];
$tabela = TABELA_PERFIL;
$idusuario_logado = retorne_idusuario_logado();
$campos .= "imagem_perfil='$url_imagem_normal', ";
$campos .= "imagem_perfil_miniatura='$url_imagem_normal_miniatura'";
$query = "update $tabela set $campos where idusuario='$idusuario_logado';";
comando_executa($query);
$arquivo_antigo[0] = $pasta_upload_root."/".basename($dados_sessao['imagem_perfil']);
$arquivo_antigo[1] = $pasta_upload_root."/".basename($dados_sessao['imagem_perfil_miniatura']);
exclui_arquivo_unico($arquivo_antigo[0]);
exclui_arquivo_unico($arquivo_antigo[1]);
};
function upload_imagem_unica($pasta_upload, $novo_tamanho_imagem, $novo_tamanho_imagem_miniatura, $host_retorno, $upload_miniatura){
$data_atual = data_atual();
$fotos = $_FILES['foto'];
$extensoes_disponiveis[] = ".jpeg";
$extensoes_disponiveis[] = ".jpg";
$extensoes_disponiveis[] = ".png";
$extensoes_disponiveis[] = ".gif";
$extensoes_disponiveis[] = ".bmp";
$nome_imagem = $fotos['tmp_name'];
$nome_imagem_real = $fotos['name'];
$image_info = getimagesize($_FILES["foto"]["tmp_name"]);
$largura_imagem = $image_info[0];
$altura_imagem = $image_info[1];
$extensao_imagem = ".".strtolower(pathinfo($nome_imagem_real, PATHINFO_EXTENSION));
$nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem;
$nome_imagem_final_miniatura = md5($nome_imagem_real.$data_atual.$data_atual).$extensao_imagem;
$endereco_final_salvar_imagem = $pasta_upload.$nome_imagem_final;
$endereco_final_salvar_imagem_miniatura = $pasta_upload.$nome_imagem_final_miniatura;
$extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem);
if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){
$image = new SimpleImage();
$image->load($nome_imagem);
if($largura_imagem > $novo_tamanho_imagem){
$image->resizeToWidth($novo_tamanho_imagem);
};
$image->save($endereco_final_salvar_imagem);
if($upload_miniatura == true){
$image = new SimpleImage();
$image->load($nome_imagem);
if($largura_imagem > $novo_tamanho_imagem_miniatura){
$image->resizeToWidth($novo_tamanho_imagem_miniatura);
};
$image->save($endereco_final_salvar_imagem_miniatura);
};
$retorno['normal'] = $host_retorno.$nome_imagem_final;
$retorno['miniatura'] = $host_retorno.$nome_imagem_final_miniatura;
return $retorno;
};
};
function upload_imagem_unica_album($nome_imagem, $nome_imagem_real, $pasta_upload, $novo_tamanho_imagem, $novo_tamanho_imagem_miniatura, $host_retorno, $upload_miniatura){
$data_atual = data_atual();
$extensoes_disponiveis[] = ".jpeg";
$extensoes_disponiveis[] = ".jpg";
$extensoes_disponiveis[] = ".png";
$extensoes_disponiveis[] = ".gif";
$extensoes_disponiveis[] = ".bmp";
$image_info = getimagesize($nome_imagem);
$largura_imagem = $image_info[0];
$altura_imagem = $image_info[1];
$extensao_imagem = ".".strtolower(pathinfo($nome_imagem_real, PATHINFO_EXTENSION));
$nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem;
$nome_imagem_final_miniatura = md5($nome_imagem_real.$data_atual.$data_atual).$extensao_imagem;
$endereco_final_salvar_imagem = $pasta_upload.$nome_imagem_final;
$endereco_final_salvar_imagem_miniatura = $pasta_upload.$nome_imagem_final_miniatura;
$extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem);
if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){
$image = new SimpleImage();
$image->load($nome_imagem);
if($largura_imagem > $novo_tamanho_imagem){
$image->resizeToWidth($novo_tamanho_imagem);
};
$image->save($endereco_final_salvar_imagem);
if($upload_miniatura == true){
$image = new SimpleImage();
$image->load($nome_imagem);
if($largura_imagem > $novo_tamanho_imagem_miniatura){
$image->resizeToWidth($novo_tamanho_imagem_miniatura);
};
$image->save($endereco_final_salvar_imagem_miniatura);
};
$retorno['normal'] = $host_retorno.$nome_imagem_final;
$retorno['miniatura'] = $host_retorno.$nome_imagem_final_miniatura;
return $retorno;
};
};
function upload_imagens_album(){
$idalbum = retorne_idalbum_post();
$idusuario = retorne_idusuario_logado();
$data_atual = data_atual();
if($idalbum == null){
$idalbum = md5($idusuario.data_atual());
};
$pasta_upload_root = retorne_pasta_usuario($idusuario, 2, true);
$pasta_upload_servidor = retorne_pasta_usuario($idusuario, 2, false);
$fotos = $_FILES['fotos'];
$numero_imagens = retorne_numero_array_post_imagens();
$contador = 0;
for($contador == $contador; $contador <= $numero_imagens; $contador++){
 $nome_imagem = $fotos['tmp_name'][$contador];
$nome_imagem_real = $fotos['name'][$contador]; 
if($nome_imagem != null){
$dados_imagem = upload_imagem_unica_album($nome_imagem, $nome_imagem_real, $pasta_upload_root, ESCALA_IMAGEM_ALBUM, ESCALA_IMAGEM_ALBUM_MINIATURA, $pasta_upload_servidor, true);
};
if($nome_imagem != null){
$url_imagem = $dados_imagem['normal'];
$url_imagem_miniatura = $dados_imagem['miniatura'];
$tabela = TABELA_IMAGENS_ALBUM;
$query = "insert into $tabela values(null, '$idusuario', '$idalbum', '$url_imagem', '$url_imagem_miniatura', '$data_atual');";
comando_executa($query);
};
};
return $idalbum;
};
function campo_configura_perfil_usuario(){
global $idioma;
global $requeste;
$idusuario = retorne_idusuario_logado();
$dados = dados_perfil_usuario($idusuario);
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
$valor_campo_hidden = PAGINA_ID5;
$url_formulario = PAGINA_ACOES;
$campo_estados = gerador_select_option(retorne_array_estados_pais(), $estado, "estado", null, null);
$codigo_html = "
<div class='classe_div_configura_perfil'>
<form action='$url_formulario' method='post' enctype='multipart/form-data'>
<input type='hidden' name='$requeste[5]' value='$valor_campo_hidden'>
<div class='classe_div_configura_perfil_imagem_perfil'>
<div>
<img src='$imagem_perfil' title='$nome' alt='$nome' class='imagem_perfil_usuario'>
</div>
<div>
<input type='file' name='foto' class='campo_file_imagem_perfil' id='id_campo_file_imagem_perfil'>
<input type='button' value='$idioma[62]' class='botao_padrao' onclick='simula_clique_upload_imagem_perfil();'>
</div>
</div>
<div class='classe_div_configura_perfil_campo'>
<span>$idioma[49]</span>
<input type='text' name='nome' value='$nome' required='required' placeholder='$idioma[49]'>
</div>
<div class='classe_div_configura_perfil_campo'>
<span>$idioma[50]</span>
<input type='text' name='email' value='$email' required='required' placeholder='$idioma[50]'>
</div>
<div class='classe_div_configura_perfil_campo'>
<span>$idioma[51]</span>
<input type='text' name='cnpj' value='$cnpj' required='required' placeholder='$idioma[51]'>
</div>
<div class='classe_div_configura_perfil_campo'>
<span>$idioma[52]</span>
<input type='text' name='endereco' value='$endereco' required='required' placeholder='$idioma[52]'>
</div>
<div class='classe_div_configura_perfil_campo'>
<span>$idioma[53]</span>
<input type='text' name='cidade' value='$cidade' required='required' placeholder='$idioma[53]'>
</div>
<div class='classe_div_configura_perfil_campo'>
<span>$idioma[54]</span>
$campo_estados
</div>
<div class='classe_div_configura_perfil_campo'>
<span>$idioma[55]</span>
<input type='text' name='telefone' value='$telefone' required='required' placeholder='$idioma[55]'>
</div>
<div class='classe_div_configura_perfil_campo'>
<span>$idioma[56]</span>
<input type='text' name='celular' value='$celular' required='required' placeholder='$idioma[56]'>
</div>
<div class='classe_div_configura_perfil_campo'>
<span>$idioma[57]</span>
<input type='text' name='site' value='$site' required='required' placeholder='$idioma[57]'>
</div>
<div class='classe_div_configura_perfil_campo'>
<span>$idioma[58]</span>
<input type='text' name='categoria' value='$categoria' required='required' placeholder='$idioma[58]'>
</div>
<div class='classe_div_configura_perfil_campo'>
<span>$idioma[59]</span>
<textarea required='required' placeholder='$idioma[59]' name='sobre'>$sobre</textarea>
</div>
<div class='classe_div_configura_perfil_campo'>
<span>$idioma[60]</span>
<input type='text' name='cep' value='$cep' required='required' placeholder='$idioma[60]'>
</div>
<div class='classe_div_configura_perfil_campo'>
<input type='submit' value='$idioma[61]' class='botao_padrao'>
</div>
</form>
</div>
";
return $codigo_html;
};
function campo_opcoes_perfil(){
if(retorne_usuario_logado() == false){
return null;
};
$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(1);
$opcoes .= "</div>";
$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(10);
$opcoes .= "</div>";
$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(11);
$opcoes .= "</div>";
$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(12);
$opcoes .= "<div class='classe_notificacoes_usuario' id='id_notifica_feeds'></div>";
$opcoes .= "</div>";
$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(13);
$opcoes .= "</div>";
$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(2);
$opcoes .= "</div>";
$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(3);
$opcoes .= "<div class='classe_notificacoes_usuario' id='id_notifica_vendas'></div>";
$opcoes .= "</div>";
$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(4);
$opcoes .= "<div class='classe_notificacoes_usuario' id='id_notifica_chat'></div>";
$opcoes .= "</div>";
$opcoes .= "<div class='classe_div_opcao'>";
$opcoes .= retorne_imagem_servidor(5);
$opcoes .= "</div>";
$codigo_html = "
<div class='classe_div_campo_opcoes_perfil'>
$opcoes
</div>
";
return $codigo_html;
};
function chama_perfil_usuario(){
global $pagina_href;
header("Location: $pagina_href[1]");
};
function constroe_imagem_perfil($idusuario, $modo){
global $pagina_href;
global $requeste;
$dados = dados_perfil_usuario($idusuario);
$imagem_perfil = $dados['imagem_perfil'];
$imagem_perfil_miniatura = $dados['imagem_perfil_miniatura'];
$nome = $dados['nome'];
if($modo == true){
$codigo_html = "
<img src='$imagem_perfil' title='$nome'>
";
}else{
$codigo_html = "
<img src='$imagem_perfil_miniatura' title='$nome' class='classe_imagem_miniatura_perfil'>
";	
};
$idusuario = $dados['idusuario'];
$url_loja_usuario = $pagina_href[4]."&".$requeste[2]."=".$idusuario;
$codigo_html = "<a href='$url_loja_usuario'>$codigo_html</a>";
return $codigo_html;
};
function constroe_perfil_basico(){
$dados = dados_perfil_usuario(retorne_idusuario_request());
$usuario_dono_perfil = retorne_usuario_dono_perfil();
$codigo_html = "
";
return $codigo_html;
};
function constroe_perfil_completo(){
global $idioma;
$idusuario = retorne_idusuario_request();
$dados = dados_perfil_usuario($idusuario);
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
$data = converte_data_amigavel($data);
$campo_seguir = campo_seguir_usuario($idusuario);
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
if($campo_seguir != null){
$codigo_html .= "
<div class='clesse_div_perfil_completo_seguir'>
$campo_seguir
</div>
";
};
return $codigo_html;
};
function constroe_perfil_usuario_produto($idusuario){
global $pagina_href;
global $idioma;
global $requeste;
$dados = dados_perfil_usuario($idusuario);
$nome = $dados['nome'];
$imagem_perfil = constroe_imagem_perfil($idusuario, false);
$url_perfil_usuario = $pagina_href[8].$idusuario."&$requeste[0]=".$idioma[19];
$url_perfil_usuario_visualizar = $pagina_href[8].$idusuario."&$requeste[0]=".$idioma[63];
$campo_seguir = campo_seguir_usuario($idusuario);
$codigo_html = "
<div class='classe_div_perfil_usuario_produto'>
<div>
$imagem_perfil
</div>
<a href='$url_perfil_usuario' title='$nome'>
<span>$nome</span>
</a>
<a href='$url_perfil_usuario_visualizar' title='$idioma[64]'>
<span>
$idioma[64]
</span>
</a>
</div>
$campo_seguir
";
return $codigo_html;
};
function dados_perfil_usuario($idusuario){
$tabela[0] = TABELA_PERFIL;
$query[0] = "select *from $tabela[0] where idusuario='$idusuario';";
$dados = retorne_dados_query($query[0]);
$imagem_perfil = $dados['imagem_perfil'];
$imagem_perfil_miniatura = $dados['imagem_perfil_miniatura'];
if($imagem_perfil == null or $imagem_perfil_miniatura == null){
$dados['imagem_perfil'] = retorne_imagem_servidor(6);
$dados['imagem_perfil_miniatura'] = retorne_imagem_servidor(7);
};
return $dados;
};
function retorne_idusuario_email($email){
$tabela = TABELA_CADASTRO;
$query = "select *from $tabela where email='$email';";
$dados = retorne_dados_query($query);
$idusuario = $dados['id'];
return $idusuario;
};
function retorne_idusuario_logado(){
$email = retorne_email_cookie();
$senha = retorne_senha_cookie();
$tabela = TABELA_CADASTRO;
$query = "select *from $tabela where email='$email' and senha='$senha';";
$dados = retorne_dados_query($query);
$idusuario = $dados['id'];
return $idusuario;
};
function retorne_idusuario_visualizando(){
global $requeste;
$idusuario = remove_html($_REQUEST[$requeste[2]]);
return $idusuario;
};
function retorne_nome_usuario($idusuario){
$dados = dados_perfil_usuario($idusuario);
return $dados['nome'];
};
function retorne_pasta_usuario($idusuario, $tipo_pasta, $modo){
$pasta_usuario_root = PASTA_ARQUIVOS_USUARIOS_ROOT.$idusuario."/".md5($idusuario)."/";
$pasta_usuario_servidor = PASTA_ARQUIVOS_USUARIOS_HOST.$idusuario."/".md5($idusuario)."/";
switch($tipo_pasta){
case 1:
$sub_pasta = "perfil_pessoal";
break;
case 2:
$sub_pasta = "album_produtos";
break;
};
$pasta_usuario_root .= $sub_pasta."/";
$pasta_usuario_servidor .= $sub_pasta."/";
criar_pasta($pasta_usuario_root);
if($modo == true){
return $pasta_usuario_root;
}else{
return $pasta_usuario_servidor;
};
};
function retorne_url_perfil_usuario($idusuario){
global $pagina_href;
global $requeste;
global $idioma;
$url_perfil = $pagina_href[8].$idusuario."&".$requeste[0]."=".$idioma[63];
return $url_perfil ;
};
function retorne_usuario_dono_perfil(){
if(retorne_idusuario_logado() == retorne_idusuario_request()){
return true;
}else{
return false;
};
};
function salva_perfil_usuario(){
$tabela = TABELA_PERFIL;
$idusuario = retorne_idusuario_logado();
$dados = dados_perfil_usuario($idusuario);
$idusuario_dados = $dados['idusuario'];
if($idusuario_dados == null){
$query = "insert into $tabela values('$idusuario', '', '', '', '', '', '', '','', '', '', '', '', '', '', '');";
comando_executa($query);
$query = array();
};
upload_imagem_perfil();
$dados = dados_perfil_usuario($idusuario);
$imagem_perfil = $dados['imagem_perfil'];
$imagem_perfil_miniatura = $dados['imagem_perfil_miniatura'];
$nome = remove_html($_REQUEST['nome']);
$email = remove_html($_REQUEST['email']);
$cnpj = remove_html($_REQUEST['cnpj']);
$endereco = remove_html($_REQUEST['endereco']);
$cidade = remove_html($_REQUEST['cidade']);
$estado = remove_html($_REQUEST['estado']);
$telefone = remove_html($_REQUEST['telefone']);
$celular = remove_html($_REQUEST['celular']);
$site = remove_html($_REQUEST['site']);
$categoria = remove_html($_REQUEST['categoria']);
$sobre = remove_html($_REQUEST['sobre']);
$cep = remove_html($_REQUEST['cep']);
$data = data_atual();
$query[] = "delete from $tabela where idusuario='$idusuario';";
$query[] = "insert into $tabela values('$idusuario', '$imagem_perfil', '$imagem_perfil_miniatura', '$nome', '$email', '$cnpj', '$endereco', '$cidade', '$estado', '$telefone', '$celular', '$site', '$categoria', '$sobre', '$cep', '$data');";
executador_querys($query);
};
function atualiza_estoque_produtos_concluir_venda($modo, $idproduto, $idamigo, $quantidade_compra){
$dados = retorne_dados_produto($idproduto);
$quantidade = $dados['quantidade'];
$tabela = TABELA_PRODUTO;
$tabela_vendas = TABELA_VENDAS;
if($modo == 1){
$quantidade -= $quantidade_compra;
}else{
$query = "select *from $tabela_vendas where idproduto='$idproduto' and idamigo='$idamigo' and venda_concluida='1';";
if(retorne_numero_linhas_query($query) > 0){
$quantidade += $quantidade_compra;
};
};
$query = "update $tabela set quantidade='$quantidade' where id='$idproduto';";
comando_executa($query);
};
function cancelar_compra(){
$idproduto = retorne_idproduto_get();
$tabela = TABELA_VENDAS;
$idusuario = retorne_idusuario_logado();
$query = "delete from $tabela where idamigo='$idusuario' and idproduto='$idproduto';";
comando_executa($query);
};
function carregar_relatorio_vendas(){
$tipo_relatorio = remove_html($_REQUEST['tipo_relatorio']);
switch($tipo_relatorio){
case 1:
$codigo_html = carrega_relatorio_vendeu();
break;
case 2:
$codigo_html = carrega_relatorio_comprou();
break;	
case 3:
$codigo_html = carrega_relatorio_vendeu();
break;
case 4:
$codigo_html = carrega_relatorio_deve_recebe();
break;
case 5:
$codigo_html = carrega_relatorio_deve_recebe();
break;
default:
$codigo_html = carrega_relatorio_vendeu();
};
return $codigo_html;
};
function carrega_relatorio_comprou(){
global $idioma;
global $requeste;
$tabela = TABELA_VENDAS;
$idusuario = retorne_idusuario_logado();
$limit_query = limit_query();
$query = "select *from $tabela where idamigo='$idusuario' order by id desc $limit_query;";
$contador = 0;
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$id = $dados['id'];
$idamigo = $dados['idamigo'];
$idproduto = $dados['idproduto'];
$quantidade = $dados['quantidade'];
$preco = $dados['preco'];
$preco_juros = $dados['preco_juros'];
$juros = $dados['juros'];
$data = $dados['data'];
$parcelamento = $dados['parcelamento'];
$preco_mensal = $dados['preco_mensal'];
$venda_concluida = $dados['venda_concluida'];
if($id != null){
$dados_produto = retorne_dados_produto($idproduto);
$titulo = $dados_produto['titulo'];
$titulo = constroe_link_idproduto($idproduto, $titulo);
$_REQUEST[$requeste[2]] = $dados_produto['idusuario'];
$perfil_usuario = constroe_perfil_completo();
$data = converte_data_amigavel($data);
$campo_cancelar_compra = "<input type='button' value='$idioma[107]' class='botao_padrao' onclick='cancelar_compra($idproduto);'>";
$codigo_html .= "
<div class='classe_div_relatorio_venda'>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[101]</span>$titulo
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[93]</span>$quantidade
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[32]</span>$preco
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[99]</span>$juros
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[100]</span>$preco_juros
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[102]</span>$parcelamento
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[103]</span>$preco_mensal
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
$data
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
$campo_cancelar_compra
</div>
$perfil_usuario
</div>
";
};
};
return $codigo_html;
};
function carrega_relatorio_deve_recebe(){
global $idioma;
global $requeste;
$tabela = TABELA_VENDAS;
$idusuario = retorne_idusuario_logado();
$limit_query = limit_query();
$tipo_relatorio = remove_html($_REQUEST['tipo_relatorio']);
switch($tipo_relatorio){
case 4:
$query = "select *from $tabela where idamigo='$idusuario' and venda_concluida='1' order by id desc $limit_query;";
break;
case 5:
$query = "select *from $tabela where idusuario='$idusuario' and venda_concluida='1' order by id desc $limit_query;";
break;
};
$contador = 0;
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$id = $dados['id'];
$idamigo = $dados['idamigo'];
$idproduto = $dados['idproduto'];
$quantidade = $dados['quantidade'];
$preco = $dados['preco'];
$preco_juros = $dados['preco_juros'];
$juros = $dados['juros'];
$data = $dados['data'];
$parcelamento = $dados['parcelamento'];
$preco_mensal = $dados['preco_mensal'];
$venda_concluida = $dados['venda_concluida'];
$pago = $dados['pago'];
if($id != null){
$dados_produto = retorne_dados_produto($idproduto);
$titulo = $dados_produto['titulo'];
$titulo = constroe_link_idproduto($idproduto, $titulo);
$data = converte_data_amigavel($data);
switch($tipo_relatorio){
case 4:
$campo_pago = constroe_campo_pago_venda_compra($dados, 1);
break;
case 5:
$campo_pago = constroe_campo_pago_venda_compra($dados, 2);
break;
};
$codigo_html .= "
<div class='classe_div_relatorio_venda'>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[101]</span>$titulo
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[93]</span>$quantidade
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[32]</span>$preco
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[99]</span>$juros
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[100]</span>$preco_juros
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[102]</span>$parcelamento
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[103]</span>$preco_mensal
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
$data
</div>
$campo_pago
</div>
";
};
};
return $codigo_html;
};
function carrega_relatorio_vendeu(){
global $idioma;
global $requeste;
$tabela = TABELA_VENDAS;
$idusuario = retorne_idusuario_logado();
$limit_query = limit_query();
$tipo_relatorio = remove_html($_REQUEST['tipo_relatorio']);
switch($tipo_relatorio){
case 1:
$query = "select *from $tabela where idusuario='$idusuario' and venda_concluida='0' order by id desc $limit_query;";
break;
case 3:
$query = "select *from $tabela where idusuario='$idusuario' and venda_concluida='1' order by id desc $limit_query;";
break;
};
$contador = 0;
$comando = comando_executa($query);
$numero_linhas = retorne_numero_linhas_comando($comando);
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC);
$id = $dados['id'];
$idamigo = $dados['idamigo'];
$idproduto = $dados['idproduto'];
$quantidade = $dados['quantidade'];
$preco = $dados['preco'];
$preco_juros = $dados['preco_juros'];
$juros = $dados['juros'];
$data = $dados['data'];
$parcelamento = $dados['parcelamento'];
$preco_mensal = $dados['preco_mensal'];
$venda_concluida = $dados['venda_concluida'];
if($id != null){
$dados_produto = retorne_dados_produto($idproduto);
$titulo = $dados_produto['titulo'];
$titulo = constroe_link_idproduto($idproduto, $titulo);
$_REQUEST[$requeste[2]] = $idamigo;
$perfil_usuario = constroe_perfil_completo();
$data = converte_data_amigavel($data);
if($venda_concluida == 0){
$campo_concluir_venda = "
<div class='classe_div_relatorio_venda_separa_campo' id='id_div_campo_conluir_venda_$idproduto'>
<input type='button' value='$idioma[104]' class='botao_padrao_2' onclick='concluir_venda($idproduto, $idamigo, 1, $quantidade);'>
<input type='button' value='$idioma[106]' class='botao_padrao' onclick='concluir_venda($idproduto, $idamigo, 0, $quantidade);'>
</div>
";
}else{
$campo_concluir_venda = null;
$campo_concluir_venda .= "<div class='classe_div_relatorio_venda_imagem_1'>";
$campo_concluir_venda .= retorne_imagem_servidor(18);
$campo_concluir_venda .= "</div>";
$campo_concluir_venda .= "<div class='classe_div_relatorio_venda_imagem_1_texto'>";
$campo_concluir_venda .= $idioma[105];
$campo_concluir_venda .= "</div>";
$campo_concluir_venda .= "<div class='classe_div_relatorio_venda_botao_descartar'>";
$campo_concluir_venda .= "<input type='button' value='$idioma[106]' class='botao_padrao' onclick='concluir_venda($idproduto, $idamigo, 0, $quantidade);'>";
$campo_concluir_venda .= "</div>";
};
$codigo_html .= "
<div class='classe_div_relatorio_venda'>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[101]</span>$titulo
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[93]</span>$quantidade
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[32]</span>$preco
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[99]</span>$juros
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[100]</span>$preco_juros
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[102]</span>$parcelamento
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
<span class='classe_div_relatorio_venda_span'>$idioma[103]</span>$preco_mensal
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
$data
</div>
<div class='classe_div_relatorio_venda_separa_campo'>
$campo_concluir_venda
</div>
$perfil_usuario
</div>
";
};
};
return $codigo_html;
};
function concluir_venda(){
$idproduto = retorne_idproduto_get();
$tabela = TABELA_VENDAS;
$idusuario = retorne_idusuario_logado();
$idamigo = remove_html($_REQUEST['idamigo']);
$quantidade = remove_html($_REQUEST['quantidade']);
$modo = remove_html($_REQUEST['modo']);
if($modo == 1){
$query = "update $tabela set venda_concluida='1' where idusuario='$idusuario' and idamigo='$idamigo' and idproduto='$idproduto';";
}else{
$query = "delete from $tabela where idusuario='$idusuario' and idamigo='$idamigo' and idproduto='$idproduto';";
};
if(retorne_usuario_logado() == true){
atualiza_estoque_produtos_concluir_venda($modo, $idproduto, $idamigo, $quantidade);
comando_executa($query);
};
};
function confirmar_pagamento(){
$idproduto = retorne_idproduto_get();
$idamigo = remove_html($_REQUEST['idamigo']);
$idusuario = retorne_idusuario_logado();
$tabela = TABELA_VENDAS;
$query = "update $tabela set pago='1' where idusuario='$idusuario' and idamigo='$idamigo' and idproduto='$idproduto';";
comando_executa($query);
};
function constroe_campo_pago_venda_compra($dados, $modo){
global $idioma;
$id = $dados['id'];
$idusuario = $dados['idusuario'];
$idamigo = $dados['idamigo'];
$idproduto = $dados['idproduto'];
$quantidade = $dados['quantidade'];
$preco = $dados['preco'];
$preco_juros = $dados['preco_juros'];
$juros = $dados['juros'];
$data = $dados['data'];
$parcelamento = $dados['parcelamento'];
$preco_mensal = $dados['preco_mensal'];
$venda_concluida = $dados['venda_concluida'];
$pago = $dados['pago'];
if($modo == 1){
if($pago == 0){
$codigo_html = "
<div class='classe_div_produto_nao_pago'>
$idioma[111]
</div>
";
}else{
$codigo_html = "
<div class='classe_div_produto_sim_pago'>
$idioma[112]
</div>
";
};
};
if($modo == 2){
if($pago == 0){
$conteudo_dialogo = "
$idioma[114]
<br>
<br>
<input type='button' value='$idioma[116]' class='botao_padrao_2' onclick='confirmar_pagamento($idproduto, $idamigo);'>
";
$campo_dialogo = janela_mensagem_dialogo($idioma[115], $conteudo_dialogo, "id_dialogo_pagou_produto_$idproduto");
$codigo_html = "
<div class='classe_div_produto_sim_pago'>
<input type='button' value='$idioma[113]' class='botao_padrao_2' onclick='dialogo_confirmar_pagamento($idproduto);'>
</div>
$campo_dialogo
";
}else{
$codigo_html = "
<div class='classe_div_produto_sim_pago'>
$idioma[117]
</div>
";
};
};
return $codigo_html;
};
function constroe_pagina_vendas(){
global $idioma;
$campo_opcoes = "
<select id='id_campo_opcoes_vendas' onchange='carregar_relatorio_vendas(1);'>
<option value='1' selected>$idioma[96]</option>
<option value='2'>$idioma[97]</option>
<option value='3'>$idioma[108]</option>
<option value='4'>$idioma[109]</option>
<option value='5'>$idioma[110]</option>
</select>
";
$codigo_html = "
<div class='classe_div_opcao_pagina_vendas'>
<span>
$idioma[98]
</span>
$campo_opcoes
</div>
<div class='classe_div_vendido_pagina_vendas' id='id_div_vendido_pagina_vendas'></div>
";
return $codigo_html;
};
 ?>