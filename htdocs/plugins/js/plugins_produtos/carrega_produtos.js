
// carrega produtos
function carrega_produtos(){


// valida existencia de div de produtos
if($("#id_div_produtos_usuario").length == 0){

// retorno nulo
return null;
	
};


// monta requisicao
$.post(v_pagina_acoes, {cat: v_categoria_produto, idproduto: v_idproduto, uid: v_uid, href: v_href, pesq: v_termo_pesquisa, contador: v_contador, tipo_pagina_acao: 4}, function(retorno){


// nao permite duplicatas
if(retorno == v_bkp){
	
return null;	

}else{
	
v_bkp = retorno;

};

// valida retorno
if(retorno.length == 0){
	
return null;
	
}else{

v_contador += (v_limit_query + 1);

};

// valida div de produtos
if(document.getElementById("id_div_produtos_usuario").innerHTML == null){

// adiciona novo conteudo
document.getElementById("id_div_produtos_usuario").innerHTML = retorno;

}else{
	
// adiciona novo conteudo
$(retorno).appendTo('#id_div_produtos_usuario');	
	
};


});

};

