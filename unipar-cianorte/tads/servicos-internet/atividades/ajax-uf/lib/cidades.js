$(document).ready(paginaCarregada);

function paginaCarregada() {
    carregarEstado();

}

function carregarEstado(){
	
	$.ajax({
		url: "ajax/ufs.php",
		type: "get",
		data:{},
		dataType: "json"
	})
		.done(carregarEstadoOk)
		.fail(carregarEstadoFail)
	;
				

}

function carregarCidades(){

}

function carregarCidade(){

}

function carregarEstadoOk(estados){
	var html = '<option value="0">Selecione o UF</option>';

	for(uf in estados){
		html += '<option value="'+estados[uf].iduf+'">'
		+estados[uf].uf+'</option>';
	}

	$("#ufSelect").html(html);
	$("#ufSelect").change(selecionarEstado);
}

function carregarEstadoFail(){
	alert("Uf não carregados, arrume seu codigo");
}

function selecionarEstado(){

}

function carregarCidadesOk(){

}

function carregarCidadesFail(){

}

function selecionarCidade(){

}

function carregarCidadeOk(){

}

function carregarCidadeFail(){

}

