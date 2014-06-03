window.onload = iniciar;

function iniciar() {
	carregar();
}

function carregar() {
	var parametros = {};

	$.get('./server/clientes.php', parametros, 'json')
	.done(carregarDone)
	.fail(carregarFail);

	return false;
}

function carregarDone(dados) {
	var i;

	var html = '';
	for(i in dados) {
		html += '<tr>'
		+ '<td>' + i + '</td>'
		+ '<td>' + dados[i].nome + '</td>'
		+ '<td>' + dados[i].email + '</td>'
		+ '<td>' + (dados[i].status == '1' ? 'Ativo' : 'Inativo') + '</td>'
		+ '<tr>';
	}
	//console.log(html);

	document.getElementById('listaDentro').innerHTML = html;

	document.getElementById('carregando').style.display = 'none';
	document.getElementById('lista').style.display = 'block';
}

function carregarFail() {
	
}