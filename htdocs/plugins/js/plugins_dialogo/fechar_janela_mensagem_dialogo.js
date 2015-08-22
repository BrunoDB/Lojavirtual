
// fechando janelas abertas
function fechar_janela_mensagem_dialogo(){


// obtendo numero de janelas
var numero_janelas = document.getElementsByClassName("div_janela_principal_mensagem_dialogo").length;


// listando e ocultando janelas 
for(contador = 0; contador <= numero_janelas; contador++){

 // ocultando janela
document.getElementsByClassName("div_janela_principal_mensagem_dialogo")[contador].style.display = "none";

};


};
