
// funcao para pre-visualizar as imagens antes de upload
function visualizar_imagens_upload_postagem(evt) {

// exibe a div com as imagens
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
