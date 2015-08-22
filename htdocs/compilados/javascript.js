
function adiciona_numero_calculadora(numero){
valor_atual = document.getElementById("id_div_visor_calculadora").innerHTML;
if(valor_atual == "0" && numero == 0){
return null;
};
if(valor_atual == 0){
document.getElementById("id_div_visor_calculadora").innerHTML = "";
};
document.getElementById("id_div_visor_calculadora").innerHTML += numero;
};
function adiciona_sinal_calculadora(sinal){
switch(sinal){
case 1:
var v_sinal = "+";
break;
case 2:
var v_sinal = "-";
break;
case 3:
var v_sinal = "/";
break;
case 4:
var v_sinal = "*";
break;
case 5:
var v_sinal = ".";
break;
};
var valor_atual = document.getElementById("id_div_visor_calculadora").innerHTML;
var v_sub_visor = document.getElementById("id_div_visor_calculadora").innerHTML;
if(v_sub_visor.indexOf(v_sinal) > -1){
return false;
};
document.getElementById("id_div_visor_calculadora").innerHTML = valor_atual + v_sinal;
};
function calcula_resultado_calculadora(tipo){
switch(tipo){
case 1:
var v_valor = document.getElementById("id_div_visor_calculadora").innerHTML;
v_valor = eval(v_valor);
document.getElementById("id_div_visor_calculadora").innerHTML = v_valor;
break;
case 2:
document.getElementById("id_div_visor_calculadora").innerHTML = 0;
break;
};
};
function avaliar_perfil_usuario(modo){
$.post(v_pagina_acoes, {uid: v_uid, modo: modo, tipo_pagina_acao: 26}, function(retorno){
location.reload();
});
};
function cadastro_usuario(){
var email = document.getElementById("id_email_login").value;
var senha = document.getElementById("id_senha_login").value;
$.post(v_pagina_acoes, {tipo_pagina_acao: 1, email: email, senha: senha}, function(retorno){
if(retorno == 1){
location.reload();
}else{
document.getElementById("id_mensagem_login_cadastro").innerHTML = retorno;
};
});
};
function atualizacoes_chat_usuario(){
var idamigos_array = [];
$.each(v_lista_chat_usuarios, function(i, el){
if($.inArray(el, idamigos_array) === -1) idamigos_array.push(el);
});
for(i = 0; i <= idamigos_array.length; i++){
idamigo = idamigos_array[i];
if(idamigo!= null){
seta_nova_mensagem_usuario_chat(idamigo);
seta_usuario_chat_online(idamigo);
};
};
};
function carrega_mensagens_chat(){
$.post(v_pagina_acoes, {contador: v_contador_chat, tipo_pagina_acao: 15}, function(retorno){
if(retorno.length == 0 || retorno == bkp_chat_usuario){
return false;
};
bkp_chat_usuario = retorno;
v_contador_chat += (v_limit_query_chat + 1);
if(document.getElementById("id_div_chat_conversa").innerHTML == null){
document.getElementById("id_div_chat_conversa").innerHTML = retorno;
}else{
$(retorno).appendTo('#id_div_chat_conversa');	
};
var objDiv = document.getElementById("id_div_chat_conversa");
objDiv.scrollTop = objDiv.scrollHeight;
});
};
function carrega_usuarios_chat(){
if($("#id_div_chat_usuarios").length == 0){
return null;
};
$.post(v_pagina_acoes, {uid: v_uid, href: v_href, contador: v_contador, tipo_pagina_acao: 12}, function(retorno){
if(retorno == v_bkp){
return null;	
}else{
v_bkp = retorno;
};
if(retorno.length == 0){
return null;
}else{
v_contador += (v_limit_query + 1);
};
if(document.getElementById("id_div_chat_usuarios").innerHTML == null){
document.getElementById("id_div_chat_usuarios").innerHTML = retorno;
}else{
$(retorno).appendTo('#id_div_chat_usuarios');	
};
});
};
function dialogo_limpa_mensagem_chat(){
document.getElementById("id_dialogo_limpar_mensagens_chat").style.display = "inline";	
};
function envia_mensagem_usuario(){
mensagem = document.getElementById("id_campo_escrever_mensagem").value;
if(mensagem.length == 0){
return false;
};
$.post(v_pagina_acoes, {mensagem: mensagem, tipo_pagina_acao: 14}, function(retorno){
document.getElementById("id_campo_escrever_mensagem").value = "";
document.getElementById("id_campo_escrever_mensagem").focus();
});
carrega_mensagens_chat();
};
function estado_lixeira(){
$.post(v_pagina_acoes, {tipo_pagina_acao: 17}, function(retorno){
if(v_estado_lixeira_bkp != retorno){
v_estado_lixeira_bkp = retorno;
document.getElementById("classe_div_campo_opcoes_chat_lixeira").innerHTML = retorno;
};
});
};
function exibir_historico_chat_dialogo(){
procedimentos_inicia_dialogo();
v_backup_historico_antigo_chat = "";
v_contador_avanco_hist_chat = 0;
document.getElementById("id_janela_dialogo_historico_mensagens_chat_atual").style.display = "inline";
document.getElementById("id_div_historico_mensagens_chat").innerHTML = "";
carrega_historico_conversa_chat();
};
function limpa_mensagem_chat(modo){
$.post(v_pagina_acoes, {modo: modo, tipo_pagina_acao: 16}, function(retorno){
bkp_chat_usuario = "";
v_estado_lixeira_bkp = "";
document.getElementById("id_div_chat_conversa").innerHTML = "";
executa_som(1);
});
fechar_janela_mensagem_dialogo();
};
function mudar_idusuario_chat(idusuario){
$.post(v_pagina_acoes, {uid: idusuario, tipo_pagina_acao: 13}, function(retorno){
bkp_chat_usuario = "";
v_estado_lixeira_bkp = "";
v_contador_chat = -v_limit_query_chat;
document.getElementById("id_div_chat_conversa").innerHTML = "";
document.getElementById("id_campo_escrever_mensagem").focus();
});
};
function notificacao_novas_mensagens_chat(){
$.post(v_pagina_acoes, {tipo_pagina_acao: 18}, function(retorno){
if(retorno.length > 0){
document.getElementById("id_notifica_chat").style.display = "block";	
document.getElementById("id_notifica_chat").innerHTML = retorno;
};
if(retorno == 0){
document.getElementById("id_notifica_chat").style.display = "none";	
};
});
};
function seta_nova_mensagem_usuario_chat(idamigo){
$.post(v_pagina_acoes, {idamigo: idamigo, tipo_pagina_acao: 19}, function(retorno){
if(parseInt(retorno) > 0){
document.getElementById("id_notificacao_nova_mensagem_usuario_" + idamigo).style.display = "block";
document.getElementById("id_notificacao_nova_mensagem_usuario_" + idamigo).innerHTML = retorno;
}else{
document.getElementById("id_notificacao_nova_mensagem_usuario_" + idamigo).style.display = "none";
};
});
};
function seta_usuario_chat_online(idusuario){
$.post(v_pagina_acoes, {uid: idusuario, tipo_pagina_acao: 20}, function(retorno){
if(retorno.length > 0){
document.getElementById("id_div_usuario_online_chat_" + idusuario).innerHTML = retorno;
document.getElementById("id_div_usuario_chat_" + idusuario).style.opacity = "1";
document.getElementById("id_div_usuario_online_chat_" + idusuario).style.display = "block";
}else{
document.getElementById("id_div_usuario_online_chat_" + idusuario).innerHTML = "";
document.getElementById("id_div_usuario_chat_" + idusuario).style.opacity = "0.8";
document.getElementById("id_div_usuario_online_chat_" + idusuario).style.display = "none";
};
});
};
function calcula_preco_compra(id, preco, juros){
var v_quantidade = document.getElementById("id_select_numero_produtos_" + id).value;
var v_total_pagar_juros = (v_quantidade * preco);
var v_total_pagar = (v_quantidade * preco);
v_total_pagar_juros += (v_total_pagar_juros * juros) / 100;
v_total_pagar_juros = v_total_pagar_juros.toFixed(2);
v_total_pagar = v_total_pagar.toFixed(2);
if($("#id_div_preco_finaliza_compra_juros_" + id).length > 0){
document.getElementById("id_div_preco_finaliza_compra_juros_" + id).innerHTML = "R$ " + v_total_pagar_juros;
};
document.getElementById("id_div_preco_finaliza_compra_" + id).innerHTML = "R$ " + v_total_pagar;
};
function cancelar_compra(idproduto){
$.post(v_pagina_acoes, {idproduto: idproduto, tipo_pagina_acao: 24}, function(retorno){
location.reload();
});
};
function comprar_produto(idproduto){
var quantidade = document.getElementById("id_select_numero_produtos_" + idproduto).value;
$.post(v_pagina_acoes, {idproduto: idproduto, quantidade: quantidade, tipo_pagina_acao: 21}, function(retorno){
window.open(v_pagina_inicial + "?idproduto=" + idproduto, "_self");
});
};
function atualiza_conexao_usuario(){
$.post(v_pagina_acoes, {tipo_pagina_acao: 11}, function(retorno){
});
};
function fechar_janela_mensagem_dialogo(){
var numero_janelas = document.getElementsByClassName("div_janela_principal_mensagem_dialogo").length;
for(contador = 0; contador <= numero_janelas; contador++){
document.getElementsByClassName("div_janela_principal_mensagem_dialogo")[contador].style.display = "none";
};
};
function janela_mensagem_dialogo_excluir_album(identificador){
procedimentos_inicia_dialogo();
document.getElementById("div_excluir_album_" + identificador).style.display = "inline";
};
function procedimentos_inicia_dialogo(){
};
function adiciona_emoticon(contador){
document.getElementById("id_campo_envia_msn_chat").value += v_prefixo_emoticon + " (" + contador + ") ";
document.getElementById("id_campo_envia_msn_chat").focus();
};
function carrega_feeds(){
if($("#id_div_feeds_usuario").length == 0){
return null;
};
$.post(v_pagina_acoes, {idproduto: v_idproduto, contador: v_contador, tipo_pagina_acao: 9}, function(retorno){
if(retorno == v_bkp){
return null;	
}else{
v_bkp = retorno;
};
if(retorno.length == 0){
return null;
}else{
v_contador += (v_limit_query + 1);
};
if(document.getElementById("id_div_feeds_usuario").innerHTML == null){
document.getElementById("id_div_feeds_usuario").innerHTML = retorno;
}else{
$(retorno).appendTo('#id_div_feeds_usuario');	
};
});
};
function sessao_idioma_atualizar(modo){
$.post(v_pagina_acoes, {modo: modo, tipo_pagina_acao: 6}, function(retorno){
window.open(v_pagina_inicial, "_self");
});
};
function logar_usuario(){
var email = document.getElementById("id_email_login").value;
var senha = document.getElementById("id_senha_login").value;
$.post(v_pagina_acoes, {tipo_pagina_acao: 2, email: email, senha: senha}, function(retorno){
if(retorno == 1){
window.open(v_endereco_url_produto, "_self");
}else{
document.getElementById("id_mensagem_login_cadastro").innerHTML = retorno;
};
});
};
function notificacao_feeds(){
$.post(v_pagina_acoes, {tipo_pagina_acao: 10}, function(retorno){
if(parseInt(retorno) == -1){
document.getElementById("id_notifica_feeds").style.display = "none";
}else{
document.getElementById("id_notifica_feeds").style.display = "inline";
document.getElementById("id_notifica_feeds").innerHTML = retorno;
};
});
};
function carrega_produtos(){
if($("#id_div_produtos_usuario").length == 0){
return null;
};
$.post(v_pagina_acoes, {cat: v_categoria_produto, idproduto: v_idproduto, uid: v_uid, href: v_href, pesq: v_termo_pesquisa, contador: v_contador, tipo_pagina_acao: 4}, function(retorno){
if(retorno == v_bkp){
return null;	
}else{
v_bkp = retorno;
};
if(retorno.length == 0){
return null;
}else{
v_contador += (v_limit_query + 1);
};
if(document.getElementById("id_div_produtos_usuario").innerHTML == null){
document.getElementById("id_div_produtos_usuario").innerHTML = retorno;
}else{
$(retorno).appendTo('#id_div_produtos_usuario');	
};
});
};
function dialogo_excluir_produto(identificador){
procedimentos_inicia_dialogo();
document.getElementById("id_dialogo_excluir_produto_" + identificador).style.display = "inline";
};
if($('#elemento_file_campo_publicar').length > 0){
document.getElementById('elemento_file_campo_publicar').addEventListener('change', visualizar_imagens_upload_postagem, false);
};
function excluir_produto_usuario(id){
$.post(v_pagina_acoes, {idproduto: id, tipo_pagina_acao: 27}, function(retorno){
location.reload();
});
};
function visualizar_imagens_upload_postagem(evt) {
document.getElementById("div_imagens_pre_publicacao").style.display = "table";
var files = evt.target.files;
for(var i = 0, f; f = files[i]; i++) {
if(!f.type.match('image.*')) {
continue;
}
var reader = new FileReader();
reader.onload = (function(theFile) {
return function(e) {
var div = document.createElement('div');
div.innerHTML = ['<img class="classe_imagem_pre_upload_post" src="', e.target.result, '"/>'].join('');
document.getElementById('div_imagens_pre_publicacao').insertBefore(div, null);
};
})
(f);
reader.readAsDataURL(f);
}
}
function seleciona_imagens_publicacao_usuario(){
document.getElementById("div_imagens_pre_publicacao").innerHTML = "";
document.getElementById("elemento_file_campo_publicar").click();
};
function detecta_resolucao_pagina(){
var largura = window.innerWidth;
$.post(v_pagina_acoes, {largura: largura, tipo_pagina_acao: 28}, function(retorno){
if(retorno == 1){
location.reload();
};
});
};
function carrega_seguidores(){
if($("#id_div_seguidores_usuario").length == 0){
return null;
};
$.post(v_pagina_acoes, {uid: v_uid, href: v_href, contador: v_contador, tipo_pagina_acao: 8}, function(retorno){
if(retorno == v_bkp){
return null;	
}else{
v_bkp = retorno;
};
if(retorno.length == 0){
return null;
}else{
v_contador += (v_limit_query + 1);
};
if(document.getElementById("id_div_seguidores_usuario").innerHTML == null){
document.getElementById("id_div_seguidores_usuario").innerHTML = retorno;
}else{
$(retorno).appendTo('#id_div_seguidores_usuario');	
};
});
};
function seguir_usuario(idusuario){
$.post(v_pagina_acoes, {uid: idusuario, tipo_pagina_acao: 7}, function(retorno){
location.reload();
});
};
function executa_som(som){
switch(som){
case 1:
var audio = new Audio(v_pasta_sons_sistema + 'lixeira.mp3');
break;
};
audio.play();
};
function simula_clique_upload_imagem_perfil(){
$("#id_campo_file_imagem_perfil").click();
};
function carregar_relatorio_vendas(zerar){
if(zerar == 1){
v_contador = -v_limit_query;
v_bkp = "";
document.getElementById("id_div_vendido_pagina_vendas").innerHTML = "";
};
if($("#id_div_vendido_pagina_vendas").length == 0){
return null;
};
tipo_relatorio = document.getElementById("id_campo_opcoes_vendas").value;
$.post(v_pagina_acoes, {tipo_relatorio: tipo_relatorio, contador: v_contador, tipo_pagina_acao: 22}, function(retorno){
if(retorno == v_bkp){
return null;	
}else{
v_bkp = retorno;
};
if(retorno.length == 0){
return null;
}else{
v_contador += (v_limit_query + 1);
};
if(document.getElementById("id_div_vendido_pagina_vendas").innerHTML == null){
document.getElementById("id_div_vendido_pagina_vendas").innerHTML = retorno;
}else{
$(retorno).appendTo('#id_div_vendido_pagina_vendas');	
};
});
};
function concluir_venda(id, idamigo, modo, quantidade){
$.post(v_pagina_acoes, {idproduto: id, modo: modo, idamigo: idamigo, quantidade: quantidade, tipo_pagina_acao: 23}, function(retorno){
location.reload();
});
};
function confirmar_pagamento(idproduto, idamigo){
$.post(v_pagina_acoes, {idproduto: idproduto, idamigo: idamigo, tipo_pagina_acao: 25}, function(retorno){
location.reload();
});
};
function dialogo_confirmar_pagamento(identificador){
procedimentos_inicia_dialogo();
document.getElementById("id_dialogo_pagou_produto_" + identificador).style.display = "inline";
};
