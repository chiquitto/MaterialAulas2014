window.onload = iniciar;

function iniciar() {
	document.getElementById('form').onsubmit = carregar;
}

function carregar() {
	var parametros = {
		cd: document.getElementById('cd').value
	};

	$.get('./server/cliente.php', parametros, 'json')
	.done(carregarDone)
	.fail(carregarFail);

	return false;
}

function carregarDone(dados) {
	document.getElementById('fnome').value = dados.nome;
	document.getElementById('femail').value = dados.email;
	document.getElementById('fstatus').value = dados.status;
}

function carregarFail() {
	document.getElementById('fnome').value = '';
	document.getElementById('femail').value = '';
	document.getElementById('fstatus').value = '';

	alert('Cliente inexistente');
}