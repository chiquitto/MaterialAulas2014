window.onload = iniciar;

function iniciar() {
	carregar();
}

function carregar() {
	var parametros = {};

	$.get('./server/data-hora.php', parametros, 'json')
	.done(carregarDone);
}

function carregarDone(dados) {
	document.getElementById('datahora').innerHTML = dados.datahora;
}