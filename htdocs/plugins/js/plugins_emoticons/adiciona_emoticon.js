
// adiciona o emoticon
function adiciona_emoticon(contador){

// adiciona e move o foco
document.getElementById("id_campo_envia_msn_chat").value += v_prefixo_emoticon + " (" + contador + ") ";
document.getElementById("id_campo_envia_msn_chat").focus();

};
